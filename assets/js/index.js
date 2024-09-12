
function loadImagePreview(){
   
    $("#upload-product-image").on("change", function() {
        // alert('Hock')
        // Create a FileReader object
        // alert('hi');

        // size validation
        const fileInput = $(this)[0];
        const file = fileInput.files[0];

        if (file) {
            // Validate file size
            if (file.size > 350 * 1024) {
                alert('File size must be less than 350KB');
                fileInput.value = ''; // Clear the input
                return false;
            }

            const img = new Image();
            img.src = URL.createObjectURL(file);

            img.onload = function() {
                // Validate image dimensions
                if (img.width !== 300 || img.height !== 300) {
                    alert('Image dimensions must be 300x300 pixels');
                    fileInput.value = ''; // Clear the input
                } else {
                    alert('Image is valid.');
                }
            };

            img.onerror = function() {
                alert('Invalid image file.');
                fileInput.value = ''; // Clear the input
            };
        }
        var reader = new FileReader();
        reader.onload = function () {


            $('.image-preview').attr('src', reader.result);
        }
        // Read the file as a data URL
        reader.readAsDataURL(event.target.files[0]);

    });
}

function selectpickerValidate() {
  
    $('#filter-form').on('submit', function(event) {
        if ($('#campsD').val() == '') {

            event.preventDefault();
            $('#error-message').text('Please select a region.');
        } else {
            $('#error-message').text('**');
        }
        
        
    });
}


$(document).ready(function () {

    $('#add-competition').on('click', function () {
        
        addCompetition();
    });
  
    loadImagePreview();

    selectpickerValidate();
    
    let regionId = $('#regions').val();
    let camp_name = $('.camp-name').val();
    
    loadCamps(regionId)
    function loadCamps(regions) {
        if (regions == 'empty') {
            $('#camps').empty();
            $("#camps").append(`<option value=""></option>`);
            $('#camps').selectpicker('refresh');
            return false;
        }
     
        $.ajax({
            type: "GET",
            url: "./main/fetchCamps.php?regionId=" + regions,
            contentType: false,
            processData: false,
            success: function (response) {
                let res = $.parseJSON(response);
                if(res.status == "success") {
                    
                    let camps = res.data;
                    if(camps.length == 0){
                        $('#camps').empty();
                        $("#camps").append(`<option value=""></option>`)
                        $('#camps').selectpicker('refresh');
                        return false;
                    }
                    // console.log(camps);
                    $('#camps').empty();
                    // $('#camps').selectpicker('refresh');
                    $("#camps").append(`<option value=""></option>`);
                    // alert(res.msg);     
                    // camps.forEach(camp => {
                    //     $("#camps").append(`<option value="${camp.id}">${camp.campName}</option>`)
                        
                    // });
                    // $(".department-container").removeClass("d-none");
                    var select2 = 0;
                


                    camps.forEach(camp => {
                        if(camp_name == camp.campName){
                            // alert();
                            var newOptions = [
                                `<option selected class="sel" value="${camp.id}">${camp.campName}</option>`
                            ];
                            select2 = camp.id;
                            // $('.bootstrap-select .filter-option').text(camp.campName);
                            // $('select[name=campId]').val(camp.id);
                            // $('.selectpicker').selectpicker('refresh');
                            // $('#camps').append(newOptions.prop('selected'));
                            // $('#camps').selectpicker('refresh');

                            // $('#camps').selectpicker('val', camp.id);
                           
                            
                        }else {
                            var newOptions = [
                                `<option value="${camp.id}">${camp.campName}</option>`
                            ];

                        }
                        
                        $('#camps').append(newOptions.join(''));
                        $('#camps').selectpicker('refresh');
                        
                    });
                    // alert(select2);
                    $('#camps').val(select2)
                    $('#camps').selectpicker('refresh');

                   
                }else{
                    console.log(res.status);
                }
                
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    

     // fetch department under faculty
     $(document).on("change", "#regions", function () {
        let regions = $(this).val();
        // alert('ji');
        if (regions == 'empty') {
            $('#camps').empty();
            $("#camps").append(`<option value=""></option>`);
            $('#camps').selectpicker('refresh');
            return false;
        }
     
        $.ajax({
            type: "GET",
            url: "./main/fetchCamps.php?regionId=" + regions,
            contentType: false,
            processData: false,
            success: function (response) {
                let res = $.parseJSON(response);
                if(res.status == "success") {
                    
                    let camps = res.data;
                    if(camps.length == 0){
                        $('#camps').empty();
                        $("#camps").append(`<option value=""></option>`)
                        $('#camps').selectpicker('refresh');
                        return false;
                    }
                    // console.log(camps);
                    $('#camps').empty();
                    // $('#camps').selectpicker('refresh');
                    $("#camps").append(`<option value=""></option>`);
                    // alert(res.msg);     
                    // camps.forEach(camp => {
                    //     $("#camps").append(`<option value="${camp.id}">${camp.campName}</option>`)
                        
                    // });
                    // $(".department-container").removeClass("d-none");


                    camps.forEach(camp => {
                        var newOptions = [
                            `<option value="${camp.id}">${camp.campName}</option>`
                        ];
                        $('#camps').append(newOptions.join(''));
                        $('#camps').selectpicker('refresh');
                        
                    });

                   
                }else{
                    console.log(res.status);
                }
                
            },
            error: function(error) {
                console.log(error);
            }
        });
        
    
    });
    // alert('ho')


    // $(document).on('click','#emptySelect', function(){

    //     console.log('sele');
    // });
    // $('#emptySelect').click(function() {
    //     $('#camps').empty();
    //     $('#camps').selectpicker('refresh');
    //     return false;
    // });


    
   
    // Add competion
    function addCompetition() {
        var competition = ` <div class="row mt-2">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Compititions Won</label>
                                    <input type="text" class="form-control" name="competitionsWon[]">
                                    <input type="hidden" value="" class="form-control" name="competitionId[]">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">Year Won</label>
                                    <input type="text" class="form-control" name="yearWon[]">
                                </div>
                            </div>
                            
                        </div>`
        
        $('#competions').append(competition);
    }


   

});


