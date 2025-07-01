@extends('layout')

@section('contents')


    <h2 class="text-center">การสำรองงบประมาณ</h2>

    <div class="row mt-5">
 
      <div style="width: 75%;margin: 10px auto;">
        <div class="row">

        <div class="col-md-4 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body text-center">
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-window-plus" viewBox="0 0 16 16">
                    <path
                      d="M2.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M4 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                    <path
                      d="M0 4a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v4a.5.5 0 0 1-1 0V7H1v5a1 1 0 0 0 1 1h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-2zm1 2h13V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z" />
                    <path
                      d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
                  </svg></p>
                <p class="fs-25 mb-2" ><a href="/admin/reservations/create" class="linkMenuIcon">สำรองงบประมาณ</a></p>
           
              </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body text-center">
                
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30 " fill="currentColor"
                    class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path
                      d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                  </svg>
                </p>
                <p class="fs-25 mb-2 ">
                <a href="/admin/reservations/edit" class="linkMenuIcon"> แก้ไขงบประมาณ</a></p>
               
              </div>
            </div>
          </div>
     

          <div class="col-md-4 mb-4 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body text-center">
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-ui-checks" viewBox="0 0 16 16">
                    <path
                      d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                  </svg></p>
                <p class="fs-25 mb-2"><a href="#" class="linkMenuIcon">อนุมัติเบิกงบประมาณ</a></p>
                
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-danger" >
              <div class="card-body text-center">
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-recycle" viewBox="0 0 16 16">
                    <path
                      d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.5.5 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244z" />
                  </svg> </p>
                <p class="fs-25 mb-2"><a href="#" class="linkMenuIcon">ยกเลิกการสำรอง </a></p>
              
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card" style="background-color:rgb(226, 135, 15);">
              <div class="card-body text-center">
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                  </svg>
                </p>
                <p class="fs-25 mb-2"><a href="#" class="linkMenuIcon">ส่งคืนแก้ไข </a></p>
             
              </div>
            </div>
          </div>

          
          <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card" style="background-color:rgb(4, 145, 145);">
              <div class="card-body text-center">
                <p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                  </svg>
                </p>
                <p class="fs-25 mb-2"><a href="#" class="linkMenuIcon"> รายงานการสำรอง </a></p>
               
              </div>
            </div>
          </div>
    
        </div>
      </div>
    </div>



    <div class="row mt-5">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
          <div class="card-body">
            <p class="card-title">รายการสำรองงบประมาณของท่าน </p>
            <div class="row">
              <div class="col-md-12 col-xl-12">
                <div class="row">
                  <div class="col-md-12 ">
                     .....
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
  

<!-- END session contents -->
@endsection

@section('corescript')
@endsession
