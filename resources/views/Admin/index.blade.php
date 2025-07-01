@extends('layout')

@section('contents')
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome To : {{ $profile ->firstname_TH }}  </h3>

          </div>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="/images/dashboard/people.svg" alt="people">

            <div class="weather-info">
              <div class="d-flex">
                <div class="ml-2">
                  <h4 class="location font-weight-normal">2567-2568</h4>
                  <h6 class="font-weight-normal"><a href="#">ปีงบประมาณ</a></h6>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin transparent">
        <div class="row">
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
                <a href="/admin/budget/" class="linkMenuIcon"> จัดการงบประมาณ</a></p>
                <p> (50 รายการ)</p>
              </div>
            </div>
          </div>
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
                <p class="fs-25 mb-2" ><a href="/admin/reservations/" class="linkMenuIcon">สำรองงบประมาณ</a></p>
                <p>(30 รายการ)</p>
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
                <p class="fs-25 mb-2"><a href="#" class="linkMenuIcon">เบิกงบประมาณ</a></p>
                <p>(30 รายการ)</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card " style="background-color:rgb(226, 135, 15);">
              <div class="card-body text-center">
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-recycle" viewBox="0 0 16 16">
                    <path
                      d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.5.5 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244z" />
                  </svg> </p>
                <p class="fs-25 mb-2"><a href="#" class="linkMenuIcon">โอนงบประมาณ </a></p>
                <p>(30 รายการ)</p>
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
                <p class="fs-25 mb-2"><a href="#" class="linkMenuIcon">เบิกเกินส่งคืน </a></p>
                <p>(30 รายการ)</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body text-center">
                <p><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-clock-history" viewBox="0 0 16 16">
                    <path
                      d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                    <path
                      d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                  </svg></p>
                <p class="fs-25 mb-2"><a href="#" class="linkMenuIcon">ติดตามสถานะ </a></p>
                <p>(50 รายการ)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
          <div class="card-body">
            <p class="card-title">รายการงบประมาณหน่วยงาน /  {{ session('uname') ?? 'Guest' }} / ปีงบประมาณ 2568 </p>
            <div class="row">
              <div class="col-md-12 col-xl-12">
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="table-responsive">
                      <table class="table table-fis table-striped">
                        <thead>
                          <tr>
                            <th>รหัสงบประมาณ</th>
                            <th>รายการ</th>
                            <th>งบประมาณ</th>
                            <th>สิถิติการใช้งบประมาณ</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class=""> 68-02-EE-D2-16-A004 </td>
                            <td>
                              <div class="text-detail_td">ครุภัณฑ์จอแสดงผล ห้องเรียนใหญ่ชั้น 4
                                และห้องปฏิบัติการกลาง อาคารภาควิชาวิศวกรรมไฟฟ้า 2 ชุด</div>
                            </td>
                            <td>
                              <h5 class="font-weight-bold mb-0"><?= number_format(3000000, 2) ?></h5>
                            </td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>

                          </tr>
                          <tr>
                            <td class="">68-02-EE-D2-16-A007 </td>
                            <td>ครุภัณฑ์คอมพิวเตอร์เดสก์ท็อปประสิทธิภาพสูง 4 ชุด</td>
                            <td>
                              <h5 class="font-weight-bold mb-0"><?= number_format(228000.00, 2) ?></h5>
                            </td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                  aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>

                          </tr>
                          <tr>
                            <td class="">68-02-EE-D2-16-A009 </td>
                            <td>ชุดครุภัณฑ์มัลติมิเตอร์และเครื่องบัดกรีงานไฟฟ้า 1 ชุด</td>
                            <td>
                              <h5 class="font-weight-bold mb-0"><?= number_format(120000.00, 2) ?></h5>
                            </td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 95%"
                                  aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>

                          </tr>
                          <tr>
                            <td class="">68-02-EE-D2-16-A011 </td>
                            <td>ชุดไมโครคอนโทรลเลอร์และอุปกรณ์ต่อพ่วง 1 ชุด</td>
                            <td>
                              <h5 class="font-weight-bold mb-0"><?= number_format(100000.00, 2) ?></h5>
                            </td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
                                  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>

                          </tr>
                          <tr>
                            <td class="">68-02-EE-D2-16-A160</td>
                            <td>ชุดเครื่องวิเคราะห์สัญญาณ 1 ชุด</td>
                            <td>
                              <h5 class="font-weight-bold mb-0"><?= number_format(2600000.00, 2) ?></h5>
                            </td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 40%"
                                  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>

                          </tr>
                          <tr>
                            <td class="">68-02-EE-D2-16-A006 </td>
                            <td>ชุดครุภัณฑ์งานช่างเวิร์คช็อป 1 ชุด </td>
                            <td>
                              <h5 class="font-weight-bold mb-0"><?= number_format(250000.00, 2) ?></h5>
                            </td>
                            <td class="w-100 px-0">
                              <div class="progress progress-md mx-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
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
