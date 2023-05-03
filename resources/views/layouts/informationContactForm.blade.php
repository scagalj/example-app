<div class="contactUsContainer">
    <!--<h4 class="f-w-6"> {{ __('messages.YourReservation')}}</h4>-->

    <!--@if (session('booking-request-status'))-->
    <!--    <div class="requestResponse">
            <p>{{ __('messages.YourRequestIsSuccessfulySent') }}</p>
            <p>{{ __('messages.WeWillGetBackToYou') }}</p>
        </div>-->
    <!--@else-->

    <div>
        <h3><span>{{ __('messages.HaveQuestion?')}}</span></h3>
        <p><span>{{__('messages.HaveQuestionContactUs')}}</span>
    </div>

    <div class="form-group mt-4 mb-2">
        <div class="input-date">
            <span>{{ __('messages.FirstName')}}:</span>
            <input class="form-control datePickerBtn inputFies" type="text" id="firstAndLastName" name="firstName" value="" required="true">
        </div>
        <div class="input-date">
            <span>{{ __('messages.EmailAdress')}}:</span>
            <input class="form-control datePickerBtn inputFies" type="text" id="mail" name="email" value="" required="true">
        </div>

<!--        <div class="input-date">
            <span>{{ __('messages.CheckIn')}}:</span>
            <input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off"  data-provide="datepicker" id="checkIn" name="checkIn" value="">
        </div>
        <div class="input-date">
            <span>{{ __('messages.CheckOut')}}:</span>
            <input class="date-pickers form-control datePickerBtn inputFies" type="text" autocomplete="off" data-provide="datepicker" id="checkOut" name="checkOut" value="">
        </div>

        <div class="input-date">
            <label for="type">{{ __('messages.Apartment')}}:</label>
            <select name="apartment" id="apartment" class="form-control datePickerBtn inputFies">
                <option value="none">{{ __('messages.NoApartmentSelected')}}</option>
                @foreach (App\Http\Controllers\ApartmentController::getAll() as $apartment)
                <option value="{{ $apartment->id }}">{{ $apartment->name }}</option>
                @endforeach
            </select>
        </div>-->

        <div class="input-date">
            <span>{{ __('messages.WriteYourMessage')}}:</span>
            <textarea class="form-control textAreaInputFiels inputFies" rows="3" type="text" id="note" name="note" value="" required="true"></textarea>
        </div>
    </div>

    <div class=" uppercase input-date">
        <button type="submit" class="makeRequestBtn uppercase">{{ __('messages.Send')}}</button>
    </div>
    <!--@endif-->
</div>


<script>
    $(document).ready(function () {
        $(".date-pickers").datepicker.defaults.format = 'dd.mm.yyyy';
    });
</script>