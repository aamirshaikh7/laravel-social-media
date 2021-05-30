<h1 class="display-5">What's on your mind?</h1>
<form>
    <textarea class="border rounded form-control mb-1" rows="6" maxlength="500"></textarea>
    <img src="{{ auth()->user()->profile }}" alt="">
    <button class="btn btn-secondary border rounded-pill float-end" type="button">Lweet it</button>
</form>