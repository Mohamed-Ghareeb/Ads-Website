<div class="row">
    @php $input = 'title'; @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Title</label>
            <input type="text" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input = 'icon'; @endphp
    <div class="col-md-12">
        <div>
            <label class="bmd-label-floating">Icon</label><br>
            <input type="file" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
  
    {{-- @php $input = 'group'; @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Group</label>
            <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                <option value="">.....</option>
                <option value="admin" {{ isset($row) && $row->{$input} == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ isset($row) && $row->{$input} == 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div> --}}
</div>

