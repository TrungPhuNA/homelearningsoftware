<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Content</title>
</head>
<style>
    html,
    body {
        margin: 0;
        padding: 0;
        font-family: 'Fragment Mono', monospace;
    }

    .header {
        width: 100%;
        height: auto;
        display: flex;
    }

    .navbar {
        width: 100%;
    }



    /*  */
    .main {
        display: flex;
        width: 100%;

    }

    .slide-content {
        width: 21%;
        height: auto;
        padding:20px 0px 0px 20px;
        display: flex;
        flex-direction: column;
    }

    .slide-content a {
        text-decoration: none;
        color: #000;
        display: block;
    }

    .container {
        display: flex;
        width: 100%;
        height: 1000px;
        margin-top: 20px;
    }

    .content {
        width: 90%;
        height: 200px;
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .page{
        margin: auto;
    }
    /*  */
    
    .list-cate-sidebar .active {
        color: #28a745;
    }
</style>

<body>
@include('frontend.component._inc_header')
<div class="main">
    <div class="slide-content">
        @if (isset($categoyParent) && $categoyParent)
            <div style="text-align:center" class="shadow-none p-3 mb-5 bg-light rounded">{{ $categoyParent->cpo_name }}</div>
        @else
            <div style="text-align:center" class="shadow-none p-3 mb-5 bg-light rounded">{{ $categoy->cpo_name }}</div>
        @endif

        <div style="text-align:center; margin-top: -40px;" class="collapse show shadow p-3 mb-5 bg-white rounded" >
            <div class="card-body list-cate-sidebar">
                @foreach($CategoryChildrens as $key => $childrenCate)
                    <a class="{{ $childrenCate->id == $idCate ? 'active' : '' }}" href="/danh-muc/{{ $childrenCate->cpo_slug }}/{{ $childrenCate->id }}">{{ $childrenCate->cpo_name }}</a>
                @endforeach
            </div>
        </div>

    </div>
    <div class="container shadow p-3 mb-5 bg-white rounded" style="background-color: whitesmoke;">
        <div class="content">
            <h1>{{  $postDetail->po_title }}</h1>
            <div>
                {!! $postDetail->po_content !!}
            </div>
            <div class="">
                <nav aria-label="Page navigation example">
                    <ul class="pagination" style="display: flex;flex-direction: column">

                        <?php
                        $posts = DB::table('posts')
                            ->leftJoin('categoryposts', 'categoryposts.id', '=', 'posts.po_category_post_id')
                            ->select('posts.id','posts.po_title','posts.po_slug','posts.po_category_post_id','categoryposts.cpo_slug')
                            ->where('po_category_post_id',$categoy->id)->orderBy('po_sort','ASC')->get();
                        ?>
                        @if($posts->count() > 0 )
                            @foreach($posts as $key => $post)
                                <li class="page-item"><a class="age-link" href="/bai-viet/{{ $childrenCate->cpo_parent_id }}/{{ $post->po_slug }}/{{ $post->id }}" title="{{ $post->po_title }}" style="color: #000">B??i {{ $key + 1 }} : {{ $post->po_title }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </nav>
            </div>
        </div>

    </div>

</div>
<div class="footer" style="padding: 20px ; width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    background-color: rgb(2, 2, 2);
    text-align: center;
    color: white;">
        <p> Homelearningsoftware ???????c t???i ??u h??a cho vi???c h???c t???p. C??c v?? d??? c?? th??? ???????c ????n gi???n h??a ????? c???i thi???n kh???
            n??ng ?????c v?? hi???u c?? b???n. C??c h?????ng d???n, t??i li???u tham kh???o nh??ng ch??ng t??i kh??ng th??? ?????m b???o t??nh ch??nh x??c
            ho??n to??n c???a t???t c??? n???i dung. Trong khi s??? d???ng trang web n??y, b???n ?????ng ?? ???? ?????c v?? ch???p nh???n c??c ??i???u
            kho???n s??? d???ng, cookie v?? ch??nh s??ch b???o m???t c???a ch??ng t??i.
            </p>
            <p>Copyright by Nam & Hau</p>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script>

</script>

</html>
