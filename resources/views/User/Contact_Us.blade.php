<x-app-layout>
    <style>
        .alert-container {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    width: 300px;
    text-align: center;
    z-index: 1000;
    display: none;
}

.alert {
    padding: 15px;
    border: 1px solid #ddd;
    background-color: #f8f8f8;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: inline-block;
}

.alert-success {
    color: #ffffff;
    background-color: #4CAF50;
}

.close-btn {
    cursor: pointer;
    color: #ffffff;
    font-weight: bold;
    margin-left: 10px;
}

        body{
            background-color: #e0e0e0;
        }
        .form-container {
            width: 400px;
            background: linear-gradient(#212121, #212121) padding-box,
                linear-gradient(145deg, transparent 35%, #e81cff, #40c9ff) border-box;
            border: 2px solid transparent;
            padding: 32px 24px;
            font-size: 14px;
            font-family: inherit;
            color: white;
            display: flex;
            flex-direction: column;
            gap: 20px;
            box-sizing: border-box;
            border-radius: 16px;
            background-size: 200% 100%;
            animation: gradient 5s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .form-container button:active {
            scale: 0.95;
        }

        .form-container .form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-container .form-group {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .form-container .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #717171;
            font-weight: 600;
            font-size: 12px;
        }

        .form-container .form-group input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 8px;
            color: #fff;
            font-family: inherit;
            background-color: transparent;
            border: 1px solid #414141;
        }

        .form-container .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border-radius: 8px;
            resize: none;
            color: #fff;
            height: 96px;
            border: 1px solid #414141;
            background-color: transparent;
            font-family: inherit;
        }

        .form-container .form-group input::placeholder {
            opacity: 0.5;
        }

        .form-container .form-group input:focus {
            outline: none;
            border-color: #e81cff;
        }

        .form-container .form-group textarea:focus {
            outline: none;
            border-color: #e81cff;
        }

        .form-container .form-submit-btn {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            align-self: flex-start;
            font-family: inherit;
            color: #717171;
            font-weight: 600;
            width: 40%;
            background: #313131;
            border: 1px solid #414141;
            padding: 12px 16px;
            font-size: inherit;
            gap: 8px;
            margin-top: 8px;
            cursor: pointer;
            border-radius: 6px;
        }

        .form-container .form-submit-btn:hover {
            background-color: #fff;
            border-color: #fff;
        }
    </style>
        <div style="height: 100px">
        </div>
        @if(session('success'))
        <div id="alert-container" class="alert-container">
            <div id="alert" class="alert alert-success">
                {{ session('success') }}
                <span id="close-btn" class="close-btn">&times;</span>
            </div>
        </div>
    @endif

    <!-- Your content goes here -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertContainer = document.getElementById('alert-container');
            const alert = document.getElementById('alert');
            const closeBtn = document.getElementById('close-btn');

            closeBtn.addEventListener('click', function() {
                alertContainer.style.display = 'none';
            });

            // Show the alert after the page is loaded
            alertContainer.style.display = 'block';
        });
    </script>
    <center>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h2>Contact Us</h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <div   class="form-container">
            <form action="{{ route('store.contactus') }}"  enctype="multipart/form-data"
                method="post">
                @csrf
                <div class="form-group">
                    <label for="email">User Name</label>
                    <input name="name" required value="{{old('name')}}"  id="email" type="text">
                    <br>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Company Email</label>
                    <input name="email" required value="{{old('email')}}"  id="email" type="text">
                    <br>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="textarea">How Can We Help You?</label>
                    <textarea name="message" required cols="50" rows="10" id="textarea" >     
                        {{old('message')}}
                        </textarea>
                    @error('message')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="form-submit-btn">Submit</button>
            </form>
        </div>
    </center>
    <br>
    <br>
</x-app-layout>
