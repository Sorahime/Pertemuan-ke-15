<form method="POST" action="/comments">
    @csrf

    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

    <textarea name="message" placeholder="Tulis komentar..."></textarea>
    <br> <button type="submit">Kirim</button>
</form>
