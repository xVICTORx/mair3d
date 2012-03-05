$(document).ready(function () {
    var options = {
        width: 500,
        labelswidth: "40%",
        addCaption: "Agregar un cliente",
        editCaption: "Modificar cliente",
        bSubmit: "Guardar cliente",
        bCancel: "Cancelar",
        bClose: "Cerrar",
        saveData: "Se han modificado los datos, ¿guardar cambios?",
        bYes : "Si",
        bNo : "No",
        bExit : "Cancelar",
        closeAfterEdit: true,
        closeAfterAdd: true,
        closeOnEscape: true,
        msg: {
            required:"Campo obligatorio",
            number:"Introduzca un número",
            minValue:"El valor debe ser mayor o igual a ",
            maxValue:"El valor debe ser menor o igual a ",
            email: "no es una dirección de correo válida",
            integer: "Introduzca un valor entero",
            date: "Introduza una fecha correcta ",
            url: "no es una URL válida. Prefijo requerido ('http://' or 'https://')",
            nodefined : " no está definido.",
            novalue : " valor de retorno es requerido.",
            customarray : "La función personalizada debe devolver un array.",
            customfcheck : "La función personalizada debe estar presente en el caso de validación personalizada."
        }
    };
    $("#clientesGrid").jqGrid({
        colNames: ["idCliente", "Nombre", "Ap Paterno", "Ap Materno", "Nombre empresa", "Telefono", "Correo Electronico","Razon social","R.F.C.","Calle", "Numero","Colonia", "Municipio", "Estado", "CP", "Nombre de Usuario", "Correo Electronico Factura", "Calle Envio", "Numero Exterior Envio","Numero Interior Envio" ,"Colonia Envio", "Municipio Envio", "Estado Envio", "CP Envio"],
        colModel: [
        {
            name: "id",
            index: "id",
            editable: false,
            hidden: true
        },
        {
            name: "nombre",
            index: "nombre",
            editable: true
        },
        {
            name: "apPaterno",
            index: "apPaterno",
            editable: true
        },
        {
            name: "apMaterno",
            index: "apMaterno",
            editable: true
        },
        {
            name: "nombreEmpresa",
            index: "nombreEmpresa",
            editable: true
        },
        {
            name: "telefono",
            index: "telefono",
            editable: true
        },
        {
            name: "email",
            index: "email",
            editable: true
        },
        {
            name: "razonSocial",
            index: "razonSocial",
            editable: true
        },
        {
            name: "rfc",
            index: "rfc",
            editable: true
        },
        {
            name: "calle",
            index: "calle",
            editable: true
        },
        {
            name: "numero",
            index: "numero",
            editable: true
        },
        {
            name: "colonia",
            index: "colonia",
            editable: true
        },
        {
            name: "municipio",
            index: "municipio",
            editable: true
        },
        {
            name: "estado",
            index: "estado",
            editable: true
        },
        {
            name: "cp",
            index: "cp",
            editable: true
        },
        {
            name: "login",
            index: "login",
            editable: true
        },
        {
            name: "email2",
            index: "email2",
            editable: true,
            viewable: true,
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "calleEnvio",
            index: "calleEnvio",
            editable: true,
            viewable: true,
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "numeroExtEnvio",
            index: "numeroExtEnvio",
            editable: true,
            viewable: true,
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "numeroIntEnvio",
            index: "numeroIntEnvio",
            editable: true,
            viewable: true,
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "coloniaEnvio",
            index: "coloniaEnvio",
            editable: true,
            viewable: true,
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "municipioEnvio",
            index: "municipioEnvio",
            editable: true,
            viewable: true,
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "estadoEnvio",
            index: "estadoEnvio",
            editable: true,
            viewable: true,
            hidden: true,
            editrules: {
                edithidden: true
            }
        },
        {
            name: "cpEnvio",
            index: "cpEnvio",
            editable: true,
            viewable: true,
            hidden: true,
            editrules: {
                edithidden: true
            }
        }
        ],
        url : base_url + "/clientes/welcome/operations?oper=load",
        editurl : base_url + "/clientes/welcome/operations",
        datatype : "json",
        caption : "Lista de clientes dados de alta",
        pager : "#clientesPager",
        sortname : "idCliente",
        rowNum : 10,
        shrinkToFit: false,
        rowList : [ 10, 20, 30 ],
        viewrecords : true,
        rownumbers : true,
        height : "300px",
        autowidth: true,
        hidegrid : false,
        jsonReader : {
            repeatitems : false
        }
    });

    $("#clientesGrid").jqGrid(
        "navGrid",
        "#clientesPager",
        {
            edit: false,
            edittext: "Editar",
            add: false,
            addtext: "Agregar",
            del: true,
            deltext: "Eliminar",
            search: false,
            view: true,
            viewtext: "Ver",
            refreshtext: "Actualizar"
        },
        options,
        options,
        options,
        options,
        options
    );

    $("#clientesGrid").jqGrid('filterToolbar', {
        searchOnEnter : false
    });
});