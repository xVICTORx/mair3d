$(document).ready(function () {
    var options = {
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
        colNames: ["idCliente", "Nombre", "Ap Paterno", "Ap Materno", "Telefono", "Calle", "Colonia", "Municipio", "Estado", "Pais", "CP", "Correo", "Otra Direccion", "Calle Envio", "Colonia Envio", "Municipio Envio", "Estado Envio", "Pais Envio", "CP Envio"],
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
            name: "telefono",
            index: "telefono",
            editable: true
        },
        {
            name: "calleNumero",
            index: "calleNumero",
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
            name: "pais",
            index: "pais",
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
            name: "otraDireccion",
            index: "otraDireccion",
            editable: true
        },
        {
            name: "calleNumeroEnvio",
            index: "calleNumeroEnvio",
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
            name: "paisEnvio",
            index: "paisEnvio",
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
        options
    );

    $("#clientesGrid").jqGrid('filterToolbar', {
        searchOnEnter : false
    });
});