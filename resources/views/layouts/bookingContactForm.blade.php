<?php
$isDatesDefined = false;
$price = 0;
$periodFrom = Session::get('checkIn');
$periodTo = Session::get('checkOut');
$guests = Session::get('guests');

if (isset($periodFrom) && isset($periodTo)) {
    $isDatesDefined = true;
    $price = $apartment->calculatePrice($periodFrom, $periodTo, $guests);
} else {
    $price = $apartment->calculatePrice(null, null, $guests);
}

$priceText = $apartment->getPriceValueTextForApartment($isDatesDefined, $price);
$priceAmount = $apartment->getPriceAmountTextForApartment($isDatesDefined, $price);

?>

<div class="requestBookingContainer">
    <h4 class="f-w-6"> {{ __('messages.YourReservation')}}</h4>

    @if (session('booking-request-status'))
    <div class="requestResponse">
        <p>{{ __('messages.YourRequestIsSuccessfulySent') }}</p>
        <p>{{ __('messages.WeWillGetBackToYou') }}</p>
    </div>
    @else


    <div class="form-group mt-4 mb-2">
        <div class="input-date p-t-b-5" style="width: 100%;display: inline-flex;">
            <div style="padding-right: 5px;">
                <span>{{ __('messages.CheckIn')}}:</span>
                <input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off" inputmode="none" data-provide="datepicker" id="checkIn" name="checkIn" value="{{ Session::get('checkIn') ?? '' }}" required="true">
            </div>
            <div style="padding-left: 5px;">
                <span>{{ __('messages.CheckOut')}}:</span>
                <input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off" inputmode="none" data-provide="datepicker" id="checkOut" name="checkOut" value="{{ Session::get('checkOut') ?? '' }}" required="true">
            </div>
        </div>

        <div class="input-date p-t-b-5" style="width: 100%;display: inline-flex;">

            <div class="input-date" style="padding-right: 10px; width: 100%;">
                <span>{{ __('messages.FirstAndLastName')}}:</span>
                <input class="form-control datePickerBtn inputFies" type="text" id="firstAndLastName" name="firstName" value="" required="true">
            </div>

            <div class="input-date" style="width: 90px;">
                <span>{{ __('messages.Guests')}}:</span>
                <input type="number" step="any"  name="guests" id="guests" min="1" max="2" class="form-control datePickerBtn inputFies" value="{{ Session::get('guests') ?? '2' }}" required="true"/>
            </div>
        </div>
        <div class="input-date p-t-b-5">
            <span>{{ __('messages.YourEMail')}}:</span>
            <input class="form-control datePickerBtn inputFies" type="text" id="mail" name="email" inputmode="email" value="" required="true">
        </div>
        <a class="collapsed addNote" data-toggle="collapse" href="#addNoteCollapse" role="button" aria-expanded="false" aria-controls="addNoteCollapse">
            + {{ __('messages.AddNote')}}
        </a>
        <div id="addNoteCollapse" class="input-date collapse">
            <span>{{ __('messages.Note')}}:</span>
            <textarea class="form-control textAreaInputFiels inputFies" rows="3" type="text" id="note" name="note" value=""></textarea>
        </div>
    </div>
    <!--<hr/>-->

    <div class="pricedetails row">
        <div class="colname col-7">
            {{ __('messages.FinalCleaning') }}
        </div>
        <div class="colvalue col-5">
            {{ __('messages.IncludedInPrice') }}
        </div>
        <div class="colname col-7">
            {{ __('messages.TouristTax') }}
        </div>
        <div class="colvalue col-5">
            {{ __('messages.IncludedInPrice') }}
        </div>
        
        <hr style="padding: 0px; margin-top: 10px; margin-bottom: 10px;"/>
        
        <div class="priceColName col-7">
            <span id="priceTextVal">
            {{ $priceText }}
            </span>
        </div>
        <div class="priceColValue col-5 uppercase">
            <span id="priceAmountVal">{{ $priceAmount }}</span>
        </div>
    </div>

    <input id="apartmentId_input" type="hidden" value="{{ $apartment->id }}" name="apartmentId_input" />
    {{-- Kad saljemo email da imamo zapis i o iznosu bookinga --}}
    <input id="apartmentPrice_input" type="hidden" value="{{ $priceAmount }}" name="apartmentPrice_input" />

    <div class=" uppercase input-date">
        <button type="submit" class="makeRequestBtn uppercase">{{ __('messages.SendRequest')}}</button>
    </div>
    @endif
</div>

<script>
    $(document).ready(function () {

        $(".date-pickers").datepicker.defaults.format = 'dd.mm.yyyy';
        $('.date-pickers').datepicker({
            startDate: new Date(),
            todayHighlight: true,
            autoclose: true,
        })

        $("#checkIn").datepicker({
        }).on("changeDate", function (e) {
            $checkInDate = $(e.currentTarget).val();
            if ($("#checkOut").val() === null || $("#checkOut").val() === undefined || $("#checkOut").val() === '') {
                $selectedDate = $(e.currentTarget).val();
                $('#checkOut').val(addDayToDate($selectedDate, 1));
                $("#checkOut").datepicker('update');
            }
            $checkOutDate = $('#checkOut').val();
            $checkInDayDate = cretaeDateFromString($checkInDate);
            if ($checkInDayDate > cretaeDateFromString($checkOutDate)) {
                $selectedDate = $(e.currentTarget).val();
                $('#checkOut').val(addDayToDate($selectedDate, 1));
                $("#checkOut").datepicker('update');
            }
            $('#checkOut').focus();

            calculatePriceForDates();
        });
        $("#checkOut").datepicker({
        }).on("changeDate", function (e) {
            calculatePriceForDates();
        });

        $('#guests').change(function () {
            calculatePriceForDates();
        });

    });
    function calculatePriceForDates() {

        $checkInDayDate = $('#checkIn').val();
        $checkOutDayDate = $('#checkOut').val();
        $apartmentId = $('#apartmentId_input').val();
        $guests = $('#guests').val();

        $.ajax({
            url: '/apartment/price',
            method: 'GET',
            data: {
                period_from: $checkInDayDate,
                period_to: $checkOutDayDate,
                apartment_id: $apartmentId,
                guests: $guests
            },
            success: function (response) {
                $('#priceAmountVal').text(response.priceAmountTag);
                $('#priceTextVal').text(response.priceTextTag);
                $('#apartmentPrice_input').val(response.priceAmountTag);
            },
            error: function (xhr, status, error) {
                console.log('ERROR: ' + error + " status: " + status);
                $('#priceAmountVal').text("ON REQUEST");
                $('#apartmentPrice_input').val("ON REQUEST");
            }
        });

    }

    function addDayToDate($date, $days) {
        $dateO = cretaeDateFromString($date);
        $dateO.setDate($dateO.getDate() + $days);

        $newDay = $dateO.getDate();
        $newMonth = ($dateO.getMonth() + 1);
        $newYear = $dateO.getFullYear();


        if ($newDay < 10) {
            $newDay = "0" + $newDay.toString();
        }
        if ($newMonth < 10) {
            $newMonth = "0" + $newMonth.toString();
        }
        return $newDay.toString() + "." + $newMonth.toString() + "." + $newYear.toString();
    }

    function cretaeDateFromString($dateAsString) {

        $values = $dateAsString.split('.');
        $day = $values[0];
        $month = $values[1];
        $year = $values[2];
        $dateS = $year + "-" + $month + "-" + $day;
        $dateO = new Date($dateS);
        return $dateO;
    }

</script>
