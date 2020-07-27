$(function() {
    $("#mytable").FullTable({
        "alwaysCreating":true,
        "selectable":true,
        "fields": {
            "kode":{
                "option":[
                    {
                        "title":"101",
                        "value":"Semester"
                    },
                    {
                        "title":"104",
                        "value":"IPS",
                    },
                    {
                        "title":"105",
                        "value":"Kompensasi",
                    },
                    {
                        "title":"106",
                        "value":"Total"
                    }
                ],
                "type":integer,
                "mandatory":true,
                "placeholder":"Pilih Kode Atribut",
                "errors":{
                    "type":"Kode must be an integer number",
                    "mandatory":"Kode name is mandatory",
                    "validator":"Kode cannot be negative"
                }
            },
            "atribut":{
                "option":[
                    {
                        "title":"Semester",
                        "value":"101"
                    },
                    {
                        "title":"IPS",
                        "value":"104",
                    },
                    {
                        "title":"Kompensasi",
                        "value":"105",
                    },
                    {
                        "title":"Total",
                        "value":"106"
                    }
                ],
                "mandatory":true,
                "placeholder":"Pilih Atribut",
                "errors":{
                    "mandatory":"Atribut name is mandatory"
                }
            },
            "nilai":{
                "mandatory":true,
                "errors":{
                    "mandatory":"Nilai name is mandatory"
                }
            }
        }
    });
    $("#test-table-add-row").click(function() {
        $("#test-table").FullTable("addRow");
    });
    $("#test-table-get-value").click(function() {
        console.log("#mytable").FullTable("getData"));
    });
    $("#mytable").FullTable("on", "error", function(errors) {
        for(var error in errors) {
            error = errors[error];
            console.log(error);
        }
    });
    $("#mytable").FullTable("draw");
});