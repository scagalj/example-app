<!DOCTYPE html>
<html>
<head>
    <title>{{ $details->get('subject');}}</title>
</head>
<body>
    <h1>{{ $details->get('subject');}}</h1>
    
    
    <p>Client: {{ $details->get('firstName'); }}</p>
    <p>Apartment: {{ $details->get('apartmentName'); }}</p>
    <p>Period: {{ $details->get('checkIn'); }} -> {{ $details->get('checkOut'); }}</p>
    <p>Contact mail: {{ $details->get('email'); }} </p>
    <p>Note: {{ $details->get('note'); }} </p>
    
</body>
</html>