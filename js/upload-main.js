$(function () {

  'use strict';

  var $logs = $('.logs');
  var p = function (text) {
        return ('<p>' + text + '</p>');
      };

      $('#btnUpload').click(function(){
        $( "input[type=file]" ).each(function() {
            if($(this).get(0).files.length !== 0){
                
                $(this).uploader({
                  url: 'upload.php',
                  dataType: 'json',
              
                  // Note: The GET is for test as POST request is not allowed on Github Pages.
                  method: 'POST',    
              
                  upload: function () {
                    $logs.empty().append(p('All files uploading'));
                  },
              
                  start: function (e) {
                    $logs.append(p('* File ' + (e.index + 1) + ' uploading'));
                  },
              
                  progress: function (e) {
                    $logs.append(p('* File ' + (e.index + 1) + ' uploaded: ' + Math.round(e.loaded / e.total * 100) + '%'));
                  },
              
                  done: function (e, data) {
                    $logs.append(p('* File ' + (e.index + 1) + ' result: ' + data.result));
                  },
              
                  fail: function (e, textStatus) {
                    $logs.append(p('* File ' + (e.index + 1) + ' result: ' + textStatus));
                  },
              
                  end: function (e) {
                    $logs.append(p('* File ' + (e.index + 1) + ' completed'));
                  },
              
                  uploaded: function () {
                    $logs.append(p('All files uploaded'));
                  }
                });         
            }
            
        });                
    });


});
