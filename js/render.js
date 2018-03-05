/* global Html, Utilities */

class Render {
    
    static SelectHours(index, day){
           
            var rowContent = [];
            //Set Day
            rowContent.push(Html.TH(day.Description));
            
            //Set select start
            var optionsHour = [];
            for (var hour = 0; hour <= (24*60)-15; hour += 15) {        
                optionsHour.push(Html.Option(Utilities.addMinutes('00:00', hour), Utilities.addMinutes('00:00', hour)));               
            }                              
            var select = Html.Select(optionsHour, ["hour-start", "form-control", "custom-select"], "start-" + index);
            
            rowContent.push(Html.TD(select, ["ts-range"]));
            
            
            var optionsHourEnd = [Html.Option("0", "00:00")];
            var selectEnd = Html.Select(optionsHourEnd, ["hour-end", "form-control", "custom-select"], "start-" + index + "-end");
            rowContent.push(Html.TD(selectEnd, ["ts-range"]));
            
            var tdDuration = Html.TD("", ["duration"], "duration-" + index);
            rowContent.push(tdDuration);
            var tr = Html.TR(rowContent, [], "");
            $('#table-form tbody').append(tr);  
    }	
}