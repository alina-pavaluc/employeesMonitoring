<div class="card-body">
    <form action="/check-in" method="post">
        @csrf
        <div class="form-group">
            <label for="hour">Hour</label>
            <input type="text" name="hour" id="hour" class="form-control">
        </div>
        
        <input type="submit" class="btn btn-danger btn-block py-5" value="Check In">
    </form>
</div>