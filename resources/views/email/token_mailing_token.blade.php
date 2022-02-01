<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $voter->election->name }}</title>
</head>

<body>
    <p>
        <b>Assalamualaikum wr.wb</b>

        <br>
        <br>

        Kami dari panitia {{ $voter->election->name }} STMIK Sumedang memberitahukan NIM dan token
        yang
        akan digunakan pada saat pemilu raya nanti, datanya sebagai berikut :

        <br>
        <br>

        NIM : <b>{{ $voter->nim }}</b> <br>
        Token : <b>{{ $voter->token }}</b>

        <br>
        <br>

        bisa di isi di link <a
            href="{{ route('login') }}?nim={{ $voter->nim }}&token={{ $voter->token }}">pemiluraya.stmik-sumedang.ac.id/</a>
        pada saat
        waktu
        pemilihan berlangsung.

        <br>
        <br>

        Demikian pemberitahuan dari kami <br>
        <b>Wassalamualaikum wr.wb</b>
    </p>
</body>

</html>
