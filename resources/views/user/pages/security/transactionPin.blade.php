@extends('layouts.dashboard')


@section('content')

 
<div class="dashboard__page--wrapper">
    <!-- Dashboard sidebar .\ -->
    <div class="page__body--wrapper" id="dashbody__page--body__wrapper">
        
        <main class="main__content_wrapper">
            <!-- dashboard container -->
            <div class="dashboard__container setting__container">
                <div class="add__property--heading mb-30">
                    <h2 class="add__property--heading__title">Transaction Pin</h2>
                    <p class="add__property--desc">Enter new password, confirm it to update your password</p>
                </div>
               
                    <div class="setting__page--inner ">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger ">
                                <ul class="mb-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="setting__profile edit-profile">
                                <div class="col-8">
                                   

                                    <form action="{{ route('user.transaction.create.pin', Auth::user()->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="edit__profile--step">
                                            <h3 class="setting__profile--title">Create Your Transaction PIN</h3>
                                            <div class="setting__profile--inner">
                                                <!-- Old PIN (Optional if PIN is not set) -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label" for="old_pin">Old PIN (Leave blank if not set)</label>
                                                    <input 
                                                        class="add__listing--input__field w-100" 
                                                        id="old_pin" 
                                                        name="old_pin" 
                                                        placeholder="Enter Old PIN" 
                                                        type="number" 
                                                        maxlength="4">
                                                </div>
                                                <!-- New PIN -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label" for="new_pin">New PIN</label>
                                                    <input 
                                                        class="add__listing--input__field" 
                                                        id="new_pin" 
                                                        name="new_pin" 
                                                        placeholder="Enter New PIN" 
                                                        type="number" 
                                                        maxlength="4" 
                                                        required>
                                                </div>
                                                <!-- Confirm New PIN -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label" for="confirm_pin">Confirm New PIN</label>
                                                    <input 
                                                        class="add__listing--input__field" 
                                                        id="confirm_pin" 
                                                        name="new_pin_confirmation" 
                                                        placeholder="Confirm New PIN" 
                                                        type="number" 
                                                        maxlength="4" 
                                                        required>
                                                </div>
                                                <!-- Submit Button -->
                                                <button type="submit" class="solid__btn add__property--btn">Create PIN</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    

                                    
                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                    
            </div>
            <!-- dashboard container .\ -->

          
        </main>

    </div>
</div>
        
       

@endsection 
