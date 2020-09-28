@extends('layouts.front')
@section('title', 'Nuestros cursos')
@section('content')
<div class="categories">
    <h4 class="title">Todos los cursos</h4>
    <ul>
        <li><a class="active" href="#">Cursos premium</a></li>
        <li><a  href="#">Cursos gratuitos</a></li>
    </ul>
</div>
<div class="courses-wrapper">
    <h4 class="title">Cursos premium</h4>
    <div class="courses-list">
        <div class="course-item">
            <div class="portrait">
                <img src="{{asset('assets/images/course-image.png')}}" alt="course item">
                <div class="price">
                    <p>S/. 45.00</p>
                </div>
            </div>
            <div class="detail">
                <h5 class="title">titulo del curso</h5>
                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, sequi.</p>
                <p class="author">Autor</p>
                <div class="actions">
                    <a href="#" class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="btn btn-primary-outline">Detalles del curso</a>
                </div>
            </div>
        </div>
        <div class="course-item">
            <div class="portrait">
                <img src="{{asset('assets/images/course-image.png')}}" alt="course item">
                <div class="price">
                    <p>S/. 45.00</p>
                </div>
            </div>
            <div class="detail">
                <h5 class="title">titulo del curso</h5>
                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, sequi.</p>
                <p class="author">Autor</p>
                <div class="actions">
                    <a href="#" class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="btn btn-primary-outline">Detalles del curso</a>
                </div>
            </div>
        </div>
        <div class="course-item">
            <div class="portrait">
                <img src="{{asset('assets/images/course-image.png')}}" alt="course item">
                <div class="price">
                    <p>S/. 45.00</p>
                </div>
            </div>
            <div class="detail">
                <h5 class="title">titulo del curso</h5>
                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, sequi.</p>
                <p class="author">Autor</p>
                <div class="actions">
                    <a href="#" class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="btn btn-primary-outline">Detalles del curso</a>
                </div>
            </div>
        </div>
        <div class="course-item">
            <div class="portrait">
                <img src="{{asset('assets/images/course-image.png')}}" alt="course item">
                <div class="price">
                    <p>S/. 45.00</p>
                </div>
            </div>
            <div class="detail">
                <h5 class="title">titulo del curso</h5>
                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, sequi.</p>
                <p class="author">Autor</p>
                <div class="actions">
                    <a href="#" class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="btn btn-primary-outline">Detalles del curso</a>
                </div>
            </div>
        </div>
        <div class="course-item">
            <div class="portrait">
                <img src="{{asset('assets/images/course-image.png')}}" alt="course item">
                <div class="price">
                    <p>S/. 45.00</p>
                </div>
            </div>
            <div class="detail">
                <h5 class="title">titulo del curso</h5>
                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, sequi.</p>
                <p class="author">Autor</p>
                <div class="actions">
                    <a href="#" class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="btn btn-primary-outline">Detalles del curso</a>
                </div>
            </div>
        </div>
        <div class="course-item">
            <div class="portrait">
                <img src="{{asset('assets/images/course-image.png')}}" alt="course item">
                <div class="price">
                    <p>S/. 45.00</p>
                </div>
            </div>
            <div class="detail">
                <h5 class="title">titulo del curso</h5>
                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, sequi.</p>
                <p class="author">Autor</p>
                <div class="actions">
                    <a href="#" class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="btn btn-primary-outline">Detalles del curso</a>
                </div>
            </div>
        </div>
        <div class="course-item">
            <div class="portrait">
                <img src="{{asset('assets/images/course-image.png')}}" alt="course item">
                <div class="price">
                    <p>S/. 45.00</p>
                </div>
            </div>
            <div class="detail">
                <h5 class="title">titulo del curso</h5>
                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, sequi.</p>
                <p class="author">Autor</p>
                <div class="actions">
                    <a href="#" class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="btn btn-primary-outline">Detalles del curso</a>
                </div>
            </div>
        </div>
        <div class="course-item">
            <div class="portrait">
                <img src="{{asset('assets/images/course-image.png')}}" alt="course item">
                <div class="price">
                    <p>S/. 45.00</p>
                </div>
            </div>
            <div class="detail">
                <h5 class="title">titulo del curso</h5>
                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, sequi.</p>
                <p class="author">Autor</p>
                <div class="actions">
                    <a href="#" class="btn btn-primary-outline"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="btn btn-primary-outline">Detalles del curso</a>
                </div>
            </div>
        </div>
        
        
    </div>
</div>
@endsection