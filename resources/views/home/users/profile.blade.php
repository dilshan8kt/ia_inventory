@extends('shared.layout')

@section('title')
  Profile
@endsection

@section('css')
<link href="{{ asset('plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
@endsection

@section('content')
        {{-- <form action="{{ route('changepassword') }}" method="POST">
            @csrf
            <input type="text" name="cp">
            <input type="text" name="p">
            <button type="submit">reset</button>
        </form> --}}
    <!-- begin profile -->
    <div class="profile">
        <div class="profile-header">
            <!-- BEGIN profile-header-cover -->
            <div class="profile-header-cover"></div>
            <!-- END profile-header-cover -->
            <!-- BEGIN profile-header-content -->
            <div class="profile-header-content">
                <!-- BEGIN profile-header-img -->
                <div class="profile-header-img">
                    <img src="{{ route('image', ['filename' => Auth::user()->id . '-' . Auth::user()->first_name . '.jpg']) }}" alt="" />
                </div>
                <!-- END profile-header-img -->
                <!-- BEGIN profile-header-info -->
                <div class="profile-header-info">
                    <h4 class="m-t-10 m-b-5">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                    {{-- <p class="m-b-10">hghgjh</p> --}}
                    <p class="m-b-10">{{ Auth::user()->hasRole('Admin') ? 'Admin':'User' }}</p>
                    <button data-backdrop="static" data-toggle="modal" data-target="#edit-profile" class="btn btn-xs btn-yellow">Edit Profile</button>
                    <button data-backdrop="static" data-toggle="modal" data-target="#change-password" class="btn btn-xs btn-yellow">Change Password</button>
                </div>
                <!-- END profile-header-info -->
            </div>
            <!-- END profile-header-content -->
            <!-- BEGIN profile-header-tab -->
            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
            </ul>
            <!-- END profile-header-tab -->
        </div>
    </div>
    <!-- end profile -->

    <!-- begin profile-content -->
    <div class="profile-content">
            <!-- begin tab-content -->
            <div class="tab-content p-0">
                <!-- begin #profile-about tab -->
                <div class="tab-pane fade show active" id="profile-about">
                    <!-- begin table -->
                    <div class="table-responsive">
                        <table class="table table-profile">
                            <thead>
                                {{-- <tr>
                                    <th></th>
                                    <th>
                                        <h4>{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}<small></small></h4>
                                    </th>
                                </tr> --}}
                            </thead>
                            <tbody>
                                <tr class="highlight">
                                    <td class="field">Employee ID</td>
                                    <td><a href="javascript:;">{{ Auth::user()->id }}</a></td>
                                </tr>
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td class="field">First Name</td>
                                    <td><a href="javascript:;">{{ Auth::user()->first_name }}</a></td>
                                </tr>
                                <tr>
                                    <td class="field">Middle Name</td>
                                    <td><a href="javascript:;">{{ Auth::user()->middle_name }}</a></td>
                                </tr>
                                <tr>
                                    <td class="field">Last Name</td>
                                    <td><a href="javascript:;">{{ Auth::user()->last_name }}</a></td>
                                </tr>
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>
                                <tr class="highlight">
                                    <td class="field">Telephone No</td>
                                    <td><a href="javascript:;">{{ Auth::user()->telephone_no }}</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table -->
                </div>
                <!-- end #profile-about tab -->
            </div>
            <!-- end tab-content -->
        </div>
        <!-- end profile-content -->

        @include('shared.modal.profile.edit-profile')
        @include('shared.modal.profile.change-password')
@endsection

@section('js')
    <script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
    <script src="{{ asset('plugins/masked-input/masked-input.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
            $("#telephone_no").mask("(999) 999-9999");
        });
    </script>
@endsection