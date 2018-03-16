class Utilities{
    static addMinutes(time, minsToAdd) {
        function D(J){
            return (J<10? '0':'') + J;
        };
        var piece = time.split(':');
        var mins = piece[0]*60 + +piece[1] + +minsToAdd;
        return D(mins%(24*60)/60 | 0) + ':' + D(mins%60);
    }

    static hourToMinutes(hour){
        var piece = hour.split(':');
        if (piece.length > 1) {
          return piece[0]*60 + +piece[1];
        } else {
          return 0;
        }

    }

    static minutesToHour(minutes){
         function D(J){
             return (J<10? '0':'') + J;
         };
         return D(minutes/60 | 0) + ':' + D(minutes%60);
    }

}

$(document).ready(function() {
    //Hide checkbox special leave
    $('.input-group-text').hide();

    //Setup date fields
    $('#weestart').datepicker({format: 'dd/mm/yyyy'});
    $('#empDate').datepicker({format: 'dd/mm/yyyy'});

    //Mask time fields
    $('.time').mask('00:00');


    //Define actions on click button Autofill
    $('#btnPreFill').click(function(){
        let preStart = $('#preStart').val();
        $('.start').not('#satStart').val(preStart);

        let preEnd = $('#preEnd').val();
        $('.end').not('#satEnd').val(preEnd);

        let preJob = $('#preJob').val();
        $('.job').not('#jobSat1').val(preJob);

        let preHours = $('#preHours').val();
        $('.hours, .job1').not('#hrsSat ').val(preHours);

        let preNormal = $('#PreNormal').val();
        $('.horNormal').not('#SatNorm').val(preNormal);

        let pre15 = $('#Pre15').val();
        $('.hor15').not('#Sat15').val(pre15);

        let pre20 = $('#Pre20').val();
        $('.hor20').not('#Sat20').val(pre20);
        calcTotal();
    });


    calc = function(startHour_param, endHour_param, destination_total_param, destination_15, destination_20, destination_Normal) {
        let startHour = $(startHour_param).val();
        let endHour = $(endHour_param).val();
        let destination = $(destination_total_param);
        function D(J){
            return (J<10? '0':'') + J;
        };
        var startPiece = startHour.split(':');
        var startMins = startPiece[0]*60 + +startPiece[1];

        var endPiece = endHour.split(':');
        var endMins = endPiece[0]*60 + +endPiece[1];
        var totalMins = ((endMins-startMins-15)<0? 0 : endMins - startMins -15);
        if(startHour !== "00:00" && endHour !== "00:00"){
            if (!isNaN(totalMins)) {

                var normal_hours = Math.min((8*60), totalMins);

                if ($(destination_15).attr('id') === 'Sat15') {
                    $(destination_Normal).val("00:00");
                    $(destination_15).val("00:00");
                    var hours_20 = totalMins;
                    $(destination_20).val(D(hours_20%(24*60)/60 | 0) + ':' + D(hours_20%60));

                } else {
                    $(destination_Normal).val(D(normal_hours%(24*60)/60 | 0) + ':' + D(normal_hours%60));
                    var hours_15 = Math.min((2*60), totalMins-normal_hours);
                    $(destination_15).val(D(hours_15%(24*60)/60 | 0) + ':' + D(hours_15%60));

                    var hours_20 = totalMins - (normal_hours + hours_15);
                    $(destination_20).val(D(hours_20%(24*60)/60 | 0) + ':' + D(hours_20%60));

                }

                destination.val(D(totalMins%(24*60)/60 | 0) + ':' + D(totalMins%60));
            }

        }
        calcTotal();
    }

    showExtra = function(btn, extra_inputs){
        $(extra_inputs).css('display', 'block');
        $(btn).fadeOut();
    }

    calcTotal = function() {

        //Calculate total of normal hours
        var normalTotal = 0;
        $('.horNormal').each(function(){
            normalTotal += Utilities.hourToMinutes($(this).val());
        });
        $('#totalNormal').val(Utilities.minutesToHour(normalTotal));

        //Calculate total of hours
        var hoursTotal = 0;
        $('.hours-total').each(function(){
            hoursTotal += Utilities.hourToMinutes($(this).val());
        });
        $('#totalWeek').val(Utilities.minutesToHour(hoursTotal));

        //Calculate total of hours 1.5
        var hours15 = 0;
        $('.hor15').each(function(){
            hours15 += Utilities.hourToMinutes($(this).val());
        });
        $('#total15').val(Utilities.minutesToHour(hours15));

        //Calculate total of hours 2.0
        var hours20 = 0;
        $('.hor20').each(function(){
            hours20 += Utilities.hourToMinutes($(this).val());
        });
        $('#total20').val(Utilities.minutesToHour(hours20));

    }

    $('.hour-start').change(function(){
      let day = $(this).attr('id').split('_');
      let row = day[2];
      let destination = $('#' + day[0] + "_end_" + row);

      //Enable and empty select list for end of the row
      destination.prop('disabled', false).empty();
      let option = '<option value="">-</option>';
      destination.append(option);

      //Get the seleted value to be used as minimum for end
      var startHour = $(this).val();
      for (var hour = Number(startHour)+15; hour <= (24*60)-15; hour += 15) {
          let option = '<option value="' + hour + '">' + Utilities.minutesToHour(hour) + '</option>';
          $(destination).append(option);
      }
    });

    $('.hour-end').change(function(){
    let day = $(this).attr('id').split('_');
    let row = Number(day[2]);

    let next_row = row+1;

    let next_row_el = $('#' + day[0] + "_start_" + next_row);

    if(next_row_el.length > 0){

      //Clear next row
      next_row_el.prop('disabled', false).empty();
      var next_duration = $('#hrs_' + day[0] + '_' + next_row);
      next_duration.val("");
      var next_end = $('#' + day[0] + '_end_' + next_row);
      next_end.val("");

      let option = '<option value="">-</option>';
      next_row_el.append(option);

      //Get the seleted value to be used as minimum for start on next row
      var startHour = $(this).val();
      //Populate select with times
      for (var hour = Number(startHour); hour <= (24*60)-15; hour += 15) {
          let option = '<option value="' + hour + '">' + Utilities.minutesToHour(hour) + '</option>';
          next_row_el.append(option);
      }
    }

    //Clear next day
    var duration = $('#hrs_' + day[0] + '_' + row);
    var start = Number($('#' + day[0] + "_start_" + row).val());
    var end = Number($(this).val());
    var lunch = row == 1 ? 15 : 0;
    duration.val(Utilities.minutesToHour(end-start-lunch));


    var hours_job1 = $('#hrs_'+ day[0] +'_1').val();
    var hours_job2 = $('#hrs_'+ day[0] +'_2').val();
    var hours_job3 = $('#hrs_'+ day[0] +'_3').val();
    var hours_job4 = $('#hrs_'+ day[0] +'_4').val();

    hours_job1 = Utilities.hourToMinutes(hours_job1)
    hours_job2 = Utilities.hourToMinutes(hours_job2)
    hours_job3 = Utilities.hourToMinutes(hours_job3)
    hours_job4 = Utilities.hourToMinutes(hours_job4)

    //Calculate total hours

      //Clear 1.5 and 2.0 fields
    $('#' + day[0] + '_15').val('');
    $('#' + day[0] + '_20').val('');

    //Declare total hours
    var totalHours = hours_job1 + hours_job2 + hours_job3 + hours_job4;
    $('#hrs_' + day[0]).val(Utilities.minutesToHour(totalHours));

    var hours_15 = 0;
    var hours_20 = 0;
    var hours_nor = 0;

    if (totalHours > (8*60) && day[0] !== "sat") {
      //If total hours is bigger than 08:00 and day different than sat set 1.5
      hours_15 = Math.min((2*60), totalHours-(8*60));
    }

    //If total hours is bigger than 10:00 or day equal sat set 1.5
    if(totalHours > (10*60) || day[0] == "sat"){
      if (day[0] == "sat") {
        hours_20 = totalHours;
      } else {
        hours_20 = totalHours - (8*60) - (2*60);
      }
    }

    hours_nor = totalHours - hours_15 - hours_20;

    $('#' + day[0] + '_15').val(Utilities.minutesToHour(hours_15));
    $('#' + day[0] + '_20').val(Utilities.minutesToHour(hours_20));
    $('#' + day[0] + '_nor').val(Utilities.minutesToHour(hours_nor));

    calcTotal();

  });
});
