
$(document).ready(function() {
    $('#SelectSiswa')
        .find('[name="nisn[]"]')
            .selectpicker()
            .change(function(e) {
                // revalidate the color when it is changed
                $('#SelectSiswa').bootstrapValidator('revalidateField', 'nisn');
            })
            .end()
        
        .bootstrapValidator({
            excluded: ':disabled',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nisn: {
                    validators: {
                        /*callback: {
                            message: 'Pilih Siswa',
                            callback: function(value, validator, $field) {
                                // Get the selected options
                                var options = validator.getFieldElements('nisn').val();
                                return (options != null && options.length >= 2 && options.length <= 4);
                            }
                        }*/
                    }
                }
            }
        });
});