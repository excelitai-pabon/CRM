@extends('admin.master')

@section('admin')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-end border-bottom">
                        <div class="col-auto d-flex">
                            <button type="button" class="btn btn-dark ms-1 " data-bs-toggle="modal" data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Add Client</button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
        <div class="row g-3 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 row-deck py-1 pb-4">
            <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="client-card">
                        <div class="client-profile">
                            <div class="client-thumb">
                                <img src="assets/images/clients/avatar1.jpg" alt="client-img-not-found">
                            </div>
                            <div class="client-info">
                                <div class="c-status">
                                    <div class="c-title">
                                        <h6 class="client-name">Lory Page</h6>
                                        <h6 class="c-designation">CEO</h6>
                                        <h6 class="c-firm-name">Google Inc</h6> 
                                    </div>
                                    <div class="c-about">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis quae perspiciatis quibusdam corrupti mollitia quibusdam corrupti mollitia ea!</p>
                                    </div>                                       
                                </div>
                                <div class="client-ed">
                                    <i class="icofont-edit text-success"></i>
                                    <i class="icofont-ui-delete text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body  d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar2.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                               <h6 class="mb-0 fw-bold d-block fs-6 mt-2">Manager</h6>
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"> <i class="icofont-edit text-success"> </i></button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"> <i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">Macrosoft</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Matt Gibson</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                <a href="profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body  d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar8.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                               <h6 class="mb-0 fw-bold d-block fs-6 mt-2">CEO</h6>
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">Google</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Lauren Reid</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                <a href="profile.html" class="btn btn-dark btn-sm mt-2"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body  d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar10.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                               <h6 class="mb-0 fw-bold d-block fs-6 mt-2">CEO</h6>
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">Pixelwibes</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Peter Vance</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                <a href="profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body  d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar11.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                               <h6 class="mb-0 fw-bold d-block fs-6 mt-2">Manager</h6>
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">Deltasoft Tech</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Una Murray</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                <a href="profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body  d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar12.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                               <h6 class="mb-0 fw-bold d-block fs-6 mt-2">CEO</h6>
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">Design Tech</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Paul Grant</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices,Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                <a href="profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body  d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar5.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                               <h6 class="mb-0 fw-bold d-block fs-6 mt-2">Manager</h6>
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">VerinSoft</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Amanda Russell</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                <a href="profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body  d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar6.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                               <h6 class="mb-0 fw-bold d-block fs-6 mt-2">CEO</h6>
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">Crestcoder</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Diane Vaughan</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                <a href="profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body  d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar7.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                               <h6 class="mb-0 fw-bold d-block fs-6 mt-2">Manager</h6>
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">Rocobend</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Piers Churchill</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                <a href="profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body  d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar1.jpg" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                               <h6 class="mb-0 fw-bold d-block fs-6 mt-2">CEO</h6>
                                <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">Google</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Lauren Reid</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center ct-btn-set">
                                <a href="chat.html" class="btn btn-dark btn-sm mt-1 me-1"><i class="icofont-ui-text-chat me-2 fs-6"></i>Chat</a>
                                <a href="profile.html" class="btn btn-dark btn-sm mt-2"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection