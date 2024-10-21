@include('header')

@include('sidebar')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
       
          <img src="{{(!empty($userSetting->profile_image))?asset('images/profile/'.$userSetting->profile_image):asset('images/profile/avtar.jpg') }}" alt="Profile" class="rounded-circle">
          <h2>{{ $firstUser->name }}</h2> 
          <h3>{{ $firstUser->email }}</h3>
       
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            {{-- <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
            </li> --}}

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              
              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8">{{ $userSetting->fullName   ?? ''}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Company</div>
                <div class="col-lg-9 col-md-8">{{ $userSetting->company   ?? ''}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Job</div>
                <div class="col-lg-9 col-md-8">{{ $userSetting->job  ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Country</div>
                <div class="col-lg-9 col-md-8">{{ $userSetting->country   ?? ''}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $userSetting->address   ?? ''}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8">{{ $userSetting->phone   ?? '' }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ $userSetting->email   ?? '' }}</div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form method="POST" action="{{ Route('user.save')}}" enctype="multipart/form-data">
                @csrf
              {{-- {{dd($userSetting)}} --}}
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src =' {{(!empty($userSetting->profile_image))?asset('images/profile/'.$userSetting->profile_image):asset('images/profile/avtar.jpg') }}' alt='Profile'></br>
                    <input type="file" name="profile_image" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="fullName" type="text" class="form-control" id="fullName" value="{{ $userSetting->fullName  ?? ''}} ">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $userSetting->about   ?? ''}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="company" type="text" class="form-control" id="company" value="{{ $userSetting->company   ?? ''}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="job" type="text" class="form-control" id="Job" value="{{ $userSetting->job  ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="country" type="text" class="form-control" id="Country" value="{{ $userSetting->country   ?? ''}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="Address" value="{{ $userSetting->address  ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="{{ $userSetting->phone   ?? ''}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="{{ $userSetting->email   ?? ''}}">
                  </div>
                </div>
                <input type="hidden" name="id" value="{{$userSetting->user_id ?? ''}}">
                <button type="submit" class="btn btn-primary">Save Changes</button>

                {{-- <div class="text-center">
                  @if (isset($userSetting->user_id))
                  
                  <a href="{{ route('user.update', $userSetting->id) }}"
                    class="btn btn-primary btn-sm">Update</a>
                  @else
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                  @endif
              </div>  --}}


              
              </form><!-- End Profile Edit Form -->

            </div>

           

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form>

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->

@include('footer')