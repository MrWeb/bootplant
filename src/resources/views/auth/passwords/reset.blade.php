@extends($layout)

@section('section')
Profilo
@endsection

@section('page')
Aggiorna Password
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Aggiorna Password') }}</div>

                <div class="card-body" v-cloak>
                    <form method="POST" action="{{ url('updatepsw') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" readonly name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nuova Password') }}</label>

                            <div class="col-md-6">
                                <input v-model="user.password" type="password" class="form-control" :class="{'is-invalid':!is_valid}" name="password" autofocus required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Una lettera maiuscola, un numero e minimo 6 caratteri</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">
                                <input v-model="user.confirm" type="password" class="form-control" :class="{'is-invalid':!are_equal}" name="password_confirmation" required>
                                <span class="invalid-feedback" role="alert">
                                    <strong>Le due password non corrispondono</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" :disabled="!are_equal || !is_valid" class="btn btn-primary">
                                    {{ __('Aggiorna Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const db_email = '{{Auth::user()->email}}';
    const app = new Vue({
        el: '#app',
        mixins: [mixin],
        data:{
            user:{email:db_email, password:'', confirm:''}
        },
        mounted(){
            this.loading = false;
        },
        computed:{
            is_valid(){
                return this.user.password.length >= 6 && (/\d/.test(this.user.password)) && (/[A-Z]/.test(this.user.password));
            },
            are_equal(){
                return this.user.password === this.user.confirm;
            }
        }
    })
</script>
@endsection

