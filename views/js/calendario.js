$("#calendario").fullCalendar({
    height: 450,
    width: 650,
    header:{
        left:'today, prev, next',
        center: 'title',
        right: 'month, basicWeek, basicDay, agendaWeek, agendaDay'
    },
    customButtons:{

    },

    dayClick:function(date,jEvent,view){
        $("#fecha").val(date.format());
        $("#modalAgregarEvento").modal(('show'));
        
        
    },

    eventSources:[
        {
            url: 'views/modules/eventos.php'
        }
    ],

    eventClick:function(calEvent,jsEvent,view){
        $("#tituloEvento").html(calEvent.title);
        $("#descripcionEvento").html(calEvent.descripcion);

        $("#modalMostrarEvento").modal();

        $(document).on("click", "#modalMostrarEvento",function(){

            $("#idEvento").attr("value",calEvent.id);
            
        })
    }
    
});
