<div class="requestBookingContainer">
    <h4 class="f-w-6"> {{ __('messages.YourReservation')}}</h4>

    @if (session('booking-request-status'))
    <div class="requestResponse">
        <p>{{ __('messages.YourRequestIsSuccessfulySent') }}</p>
        <p>{{ __('messages.WeWillGetBackToYou') }}</p>
    </div>
    @else


    <div class="form-group mt-4 mb-2">
         <div class="input-date" style="width: 100%;display: inline-flex;">
             <div style="padding-right: 5px;">
                <span>{{ __('messages.CheckIn')}}:</span>
                <input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off"  data-provide="datepicker" id="checkIn" name="checkIn" value="{{ Session::get('checkIn') ?? '' }}" required="true">
             </div>
             <div style="padding-left: 5px;">
                <span>{{ __('messages.CheckOut')}}:</span>
                <input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off" data-provide="datepicker" id="checkOut" name="checkOut" value="{{ Session::get('checkOut') ?? '' }}" required="true">
             </div>
        </div>
        <div class="input-date">
            <span>{{ __('messages.FirstAndLastName')}}:</span>
            <input class="form-control datePickerBtn inputFies" type="text" id="firstAndLastName" name="firstName" value="" required="true">
        </div>
        <div class="input-date">
            <span>{{ __('messages.YourEMail')}}:</span>
            <input class="form-control datePickerBtn inputFies" type="text" id="mail" name="email" value="" required="true">
        </div>
        <a class="collapsed" data-toggle="collapse" href="#addNoteCollapse" role="button" aria-expanded="false" aria-controls="addNoteCollapse">
        + {{ __('messages.AddNote')}}
        </a>
        <div id="addNoteCollapse" class="input-date collapse">
            <span>{{ __('messages.Note')}}:</span>
            <textarea class="form-control textAreaInputFiels inputFies" rows="3" type="text" id="note" name="note" value=""></textarea>
        </div>
    </div>

    <div class=" uppercase input-date">
        <button type="submit" class="makeRequestBtn uppercase">{{ __('messages.SendRequest')}}</button>
    </div>
    @endif
</div>

<script>
    $(document).ready(function () {
        $(".date-pickers").datepicker.defaults.format = 'dd.mm.yyyy';

//                    $( "#date22" ).datepicker.formatDate( "DD, MM d, yy", new Date( 2007, 7 - 1, 14 ), {
//  dayNamesShort: $( "#date22" ).datepicker.regional['de'].dayNamesShort,
//  dayNames: $( "#date22" ).datepicker.regional[ "de" ].dayNames,
//  monthNamesShort: $( "#date22" ).datepicker.regional[ "de" ].monthNamesShort,
//  monthNames: $( "#date22" ).datepicker.regional[ "de" ].monthNames
//});

//                     $( "#date22" ).datepicker( $.datepicker.regional[ "de" ] );
// $(".date-pickers").datepicker($.datepicker.regional['de']);
// $(".date-pickers").datepicker('option','dateFormat','dd.mm.yy');
// $(".date-pickers").datepicker('option','format','dd.mm.yy');
//                    $('.date-pickers').datepicker({
//                        format: "dd.mm.yy",
//                        toggleActive: true,
//                        todayBtn: "linked",
//                        changeMonth: true,
//                        changeYear: true,
//                        onSelect: function () {
//                            selectedDate = $.datepicker.formatDate("yy-MM-dd", $(this).datepicker('getDate'));
//                        }
//                    });
    });
</script>
