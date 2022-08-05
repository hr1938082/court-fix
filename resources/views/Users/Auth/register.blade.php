@extends('Users.Layout.auth')
@section('title')
    Login
@endsection
@section('content')
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out"
        data-aos-anchor-placement="top-bottom">
        <div class="aos-item__inner">
            <div class="container">
                <div class="content">
                    <form class="d-flex-centered" action="{{ route('register.attempt') }}" method="POST">
                        <div class="card login-form">
                            <div class="container-header text-center mt-4">
                                <div class="subtitle"><span>Register</span></div>
                            </div>
                            <div class="container pt-4 pb-4">
                                <span>Name</span>
                                <div class="form-group">
                                    <fieldset>
                                        @csrf
                                        <input type="text" id="name" placeholder="Enter your name" name="name"
                                            value="{{ old('name') }}" autofocus="autofocus" />
                                        @error('name')
                                            <small style="color: red; font-size: 13px">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                                <span>Role</span>
                                <div class="form-group">
                                    <fieldset>
                                        <input type="text" id="Role" placeholder="Enter your role" name="role"
                                            value="{{ old('role') }}" />
                                        @error('role')
                                            <small style="color: red; font-size: 13px">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                                <span>Jurisdiction</span>
                                <div class="form-group">
                                    <fieldset>
                                        <input type="text" id="Jurisdiction" placeholder="Enter your jurisdiction"
                                            name="jurisdiction" value="{{ old('jurisdiction') }}" />
                                        @error('jurisdiction')
                                            <small style="color: red; font-size: 13px">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                                <span>E-mail</span>
                                <div class="form-group">
                                    <fieldset>
                                        <input type="text" id="login" placeholder="Enter your email" name="email"
                                            value="{{ old('email') }}" />
                                        @error('email')
                                            <small style="color: red; font-size: 13px">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                                <span>Phone Number</span>
                                <div class="form-group">
                                    <fieldset>
                                        <input type="text" id="Phone number" placeholder="Enter your phone number"
                                            name="phone_number" value="{{ old('phone_number') }}" />
                                        @error('phone_number')
                                            <small style="color: red; font-size: 13px">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                                <span>Password</span>
                                <div class="form-group">
                                    <fieldset>
                                        <input type="password" id="password" placeholder="Enter your password"
                                            name="password" />
                                        <div style="border:1px solid #bbbbbb; border-radius:10px; padding:10px;">
                                            <p id="warnings"
                                                style="font-size: 17px; padding:5px; border-radius:3px; color:white; background-color: red; text-align:center;">
                                                Weak</p>
                                            <p style="font-size: 15px;">
                                                <span style="color: red" id="capitalLetterIcon">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span> At least one capital letter
                                            </p>
                                            <p style="font-size: 15px;">
                                                <span style="color: red" id="smallLetterIcon">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span>
                                                At least one Small letter
                                            </p>
                                            <p style="font-size: 15px;">
                                                <span style="color: red" id="numberIcon">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span>
                                                At least one Number
                                            </p>
                                            <p style="font-size: 15px;">
                                                <span style="color: red" id="symbolIcon">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span>
                                                At least one symbol (#?!@$%^&*_+=`\|(){}[]:;"'<>,.?-)
                                            </p>
                                            <p style="font-size: 15px;">
                                                <span style="color: red" id="tenCharLongIcon">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span> Should be 10 characters long
                                            </p>
                                            <p style="font-size: 15px;">
                                                <span style="color: green" id="yourNameIcon">
                                                    <i class="fa-solid fa-check"></i>
                                                </span> not to use your name
                                            </p>
                                        </div>
                                        <small id="passErrorBadge"
                                            style="font-size: 17px; padding:5px; border-radius:3px;display:none;color:white;text-align:center;width:200px;"></small>
                                        @error('password')
                                            <small style="color: red; font-size: 13px">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                                <span>Confirm Password</span>
                                <div class="form-group">
                                    <fieldset>
                                        <input type="password" id="Password confirmation" name="password_confirmation"
                                            placeholder="Confirm your password" />
                                        @error('password_confirmation')
                                            <small style="color: red; font-size: 13px">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="form-button mt-4"><button type="submit"
                                        class="btn btn-lg btn-primary">Register</button>
                                </div>
                                <div class="text text-gray d-flex-centered mt-4">
                                    <p>Already a member? <a class="text-dark" href="{{ route('login') }}">Login Now</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const passwordInput = document.querySelector("#password");
        passwordInput.addEventListener('keyup', (e) => {
            const value = e.target.value;
            const capitalLetterRegex = /[A-Z]/;
            const smallLetterRegex = /[a-z]/;
            const numberRegex = /[0-9]/;
            const symbolRegex = /[#?!@$%^&*_+=`\\|\(\)\{\}\[\]:;"'<>,.?-]/;
        const mediumRegex =
            /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*_+=`\\|\(\)\{\}\[\]:;"'<>,.?-]).{6,}$/;
            const strongRegex =
                /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*_+=`\\|\(\)\{\}\[\]:;"'<>,.?-]).{10,}$/;
            const name = document.querySelector('#name');
            const nameArr = name.value.split(' ');
            const tenCharLongIcon = document.querySelector('#tenCharLongIcon');
            const capitalLetterIcon = document.querySelector('#capitalLetterIcon');
            const smallLetterIcon = document.querySelector('#smallLetterIcon');
            const numberIcon = document.querySelector('#numberIcon');
            const symbolIcon = document.querySelector('#symbolIcon');
            const yourNameIcon = document.querySelector('#yourNameIcon');
            const warnings = document.querySelector('#warnings');
            if (capitalLetterRegex.test(value)) {
                capitalLetterIcon.style.color = 'green';
                capitalLetterIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
            } else {
                capitalLetterIcon.style.color = 'red';
                capitalLetterIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            }
            if (smallLetterRegex.test(value)) {
                smallLetterIcon.style.color = 'green';
                smallLetterIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
            } else {
                smallLetterIcon.style.color = 'red';
                smallLetterIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            }
            if (numberRegex.test(value)) {
                numberIcon.style.color = 'green';
                numberIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
            } else {
                numberIcon.style.color = 'red';
                numberIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            }
            if (symbolRegex.test(value)) {
                symbolIcon.style.color = 'green';
                symbolIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
            } else {
                symbolIcon.style.color = 'red';
                symbolIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            }
            if (nameArr.length > 1) {
                for (const iterator of nameArr) {
                    const iteratorUpperCase = iterator.toUpperCase();
                    const valueUppserCase = value.toUpperCase();
                    if (valueUppserCase.search(iteratorUpperCase) !== -1) {
                        yourNameIcon.style.color = 'red';
                        yourNameIcon.innerHTML = '<i class="fa-solid fa-xmark"></i';
                        break;
                    } else {
                        yourNameIcon.style.color = 'green';
                        yourNameIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
                    }
                }
            } else {
                const nameUpperCase = name.value.toUpperCase();
                const valueUpperCase = value.toUpperCase();
                if (valueUpperCase.search(nameUpperCase) !== -1) {
                    yourNameIcon.style.color = 'red';
                    yourNameIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
                } else {
                    yourNameIcon.style.color = 'green';
                    yourNameIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
                }
            }
            if (strongRegex.test(value)) {
                warnings.style.backgroundColor = 'green';
                warnings.textContent = 'Strong';
                tenCharLongIcon.style.color = 'green';
                tenCharLongIcon.innerHTML = '<i class="fa-solid fa-check"></i>';
            } else if (mediumRegex.test(value)) {
                warnings.style.backgroundColor = 'blue';
                warnings.textContent = 'Medium';
                tenCharLongIcon.style.color = 'red';
                tenCharLongIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            } else {
                warnings.style.backgroundColor = 'red';
                warnings.textContent = 'Weak';
                tenCharLongIcon.style.color = 'red';
                tenCharLongIcon.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            }

        });
    </script>
@endsection
