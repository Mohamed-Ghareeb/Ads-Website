<form action="{{ $url }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" rel="tooltip" title="Delete" class="btn btn-danger btn-link btn-sm" data-original-title="Remove User">
        <i class="material-icons">close</i>
    </button>
</form>    