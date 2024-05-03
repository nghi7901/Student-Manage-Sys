@extends('fragments')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> --}}
    <link type="text/javascript" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection

@section('content')
    <div class="mx-1 my-5 d-flex justify-content-center">
        <img src="https://elearning.vanlanguni.edu.vn/pluginfile.php/1/theme_klass/logo/1687746562/VLU_Logo_Final_VLU_logo%20ngang_Eng-280x60.png" alt="VLU-QLSV">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2 m-auto fadeInRight wow animated animated animated" style="visibility: visible; animation-name: fadeInRight;">
                <img src="https://vlu.edu.vn/_next/image?url=https%3A%2F%2Fvanlang.s3.ap-southeast-1.amazonaws.com%2Fthisisengineering_raeng_u_Oh_Bx_B23_Wao_unsplash_6500236949.jpg&w=1920&q=75" alt="" class="img-fluid" style="border-radius: 10px">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content fadeInLeft wow animated animated animated" style="visibility: visible; animation-name: fadeInLeft;">
                <div class="mb-3">
                    <h2>Về chúng tôi</h2>
                </div>
                <p class="text-justify p-1">
                    Tại đây chúng tôi sẽ cung cấp cho bạn các dịch vụ công nghệ hữu ích để hỗ trợ quá trình học tập, giảng dạy và nghiên cứu tại trường Đại học Văn Lang được thuận lợi và dễ dàng. Bất cứ khi nào bạn cần sự giúp đỡ, chúng tôi luôn nhiệt tình và sẵn sàng!
                </p>
            </div>
        </div>
    </div>

@endsection