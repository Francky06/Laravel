  @csrf

        <div class="form-group">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Entrez votre pseudo" value="{{old('name') ?? $client->name}}">
            @error('name')  
            <div class="invalid-feedback">
                Ce champ est requis <br>
                {{$errors->first('name')}} 
            </div>
            @enderror
        </div>

         <div class="form-group">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrez votre mail" value="{{old('email') ?? $client->email}}">
            @error('email')  
            <div class="invalid-feedback">
                Ce champ est requis <br>
                {{$errors->first('email')}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <select  aria-label="Default select example" name="status" class="form-select @error('status') is-invalid @enderror">
                @foreach($client->getStatusOptions() as $key => $value)
                    <option value="{{$key}}" {{$client->status == $value ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
             @error('status')  
            <div class="invalid-feedback">
                {{$errors->first('status')}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <select  aria-label="Default select example" name="entreprise_id" class="form-select @error('entreprise_id') is-invalid @enderror">
                @foreach ( $entreprises as $entreprise )
                    <option value="{{$entreprise->id}}" {{$client->entreprise_id == $entreprise->id ? 'selected' : '' }}>{{$entreprise->name}}</option>
                @endforeach
            </select>
             @error('entreprise_id')  
            <div class="invalid-feedback">
                {{$errors->first('entreprise_id')}}
            </div>
            @enderror
        </div>