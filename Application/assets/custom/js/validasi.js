$(document).ready(function() {
	$.fn.bootstrapValidator.DEFAULT_OPTIONS = $.extend({}, $.fn.bootstrapValidator.DEFAULT_OPTIONS, {
        // message: 'The field is not valid',
        /*feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },*/

    });

$('#addSiswaForm').bootstrapValidator({
        fields: {
            nisn: {
                validators: {
                    notEmpty: {
                        message: 'NISN tidak boleh kosong'
                        },
                    integer: {
                            message: 'Harus Angka'
                        },
                    stringLength: {
                        message: 'NISN 10 Digit Angka',
                        max: '10',
                        min: '10'
                    },
                    remote: {
                    	type: 'POST',
                    	name: 'nisn',
                    	url: "../../validasi/cknisn",
                    	message: 'NISN Sudah Ada'
                    	}
                    }
                },
            nama_siswa: {
                validators: {
                    notEmpty: {
                        message: 'Nama Siswa tidak boleh kosong'
                        }
                    }
                },
            alamat_siswa: {
                validators: {
                    notEmpty: {
                        message: 'Alamat Siswa tidak boleh kosong'
                        }
                    }
                },
            ortu: {
                validators: {
                    notEmpty: {
                        message: 'Nama Orang Tua tidak boleh kosong'
                        }
                    }
                },
            thn_masuk: {
                validators: {
                    notEmpty: {
                        message: 'Tahun Masuk tidak boleh kosong'
                        },
                    integer: {
                         message: 'Harus Angka'
                        },
                    stringLength: {
                        message: '4 Digit Angka',
                        max: '4',
                        min: '4'
                        }
                    }
                },     
        	}
    	});

$('#editSiswaForm').bootstrapValidator({
        fields: {
            nisn: {
                validators: {
                    notEmpty: {
                        message: 'NISN tidak boleh kosong'
                        },
                    integer: {
                            message: 'Harus Angka'
                        },
                    stringLength: {
                        message: 'NISN 10 Digit Angka',
                        max: '10',
                        min: '10'
                        }
                    }
                },
            nama_siswa: {
                validators: {
                    notEmpty: {
                        message: 'Nama Siswa tidak boleh kosong'
                        }
                    }
                },
            alamat_siswa: {
                validators: {
                    notEmpty: {
                        message: 'Alamat Siswa tidak boleh kosong'
                        }
                    }
                },
            ortu: {
                validators: {
                    notEmpty: {
                        message: 'Nama Orang Tua tidak boleh kosong'
                        }
                    }
                },
            thn_masuk: {
                validators: {
                    notEmpty: {
                        message: 'Tahun Masuk tidak boleh kosong'
                        },
                    integer: {
                         message: 'Harus Angka'
                        },
                    stringLength: {
                        message: '4 Digit Angka',
                        max: '4',
                        min: '4'
                        }
                    }
                },     
            }
        });

$('#addGuruForm').bootstrapValidator({
        fields: {
            nip: {
                validators: {
                    notEmpty: {
                        message: 'NIP tidak boleh kosong'
                        },
                    integer: {
                            message: 'Harus Angka'
                        },
                    stringLength: {
                        message: 'NIP 18-20 Digit Angka',
                        min: '18',
                        max: '20',
                    },
                    remote: {
                        type: 'POST',
                        name: 'nip',
                        url: "../../validasi/cknip",
                        message: 'NIP Sudah Ada'
                        }
                    }
                },
            nama_guru: {
                validators: {
                    notEmpty: {
                        message: 'Nama Guru tidak boleh kosong'
                        }
                    }
                },
            alamat_guru: {
                validators: {
                    notEmpty: {
                        message: 'Alamat Guru tidak boleh kosong'
                        }
                    }
                },
            gol: {
                validators: {
                    notEmpty: {
                        message: 'Golongan tidak boleh kosong'
                        }
                    }
                },
            pass_guru: {
                validators: {
                    notEmpty: {
                        message: 'Password tidak boleh kosong'
                        }
                    }
                },
            }
        });

$('#editGuruForm').bootstrapValidator({
        fields: {
            nip: {
                validators: {
                    notEmpty: {
                        message: 'NIP tidak boleh kosong'
                        },
                    integer: {
                            message: 'Harus Angka'
                        },
                    stringLength: {
                        message: 'NIP 18-20 Digit Angka',
                        min: '18',
                        max: '20',
                        }
                    }
                },
            nama_guru: {
                validators: {
                    notEmpty: {
                        message: 'Nama Guru tidak boleh kosong'
                        }
                    }
                },
            alamat_guru: {
                validators: {
                    notEmpty: {
                        message: 'Alamat Guru tidak boleh kosong'
                        }
                    }
                },
            gol: {
                validators: {
                    notEmpty: {
                        message: 'Golongan tidak boleh kosong'
                        }
                    }
                },
            }
        });




});/*End  $(document).ready(function()*/  