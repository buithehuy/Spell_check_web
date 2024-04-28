"""
URL configuration for Vietnamese_spell_check project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/4.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from AISpelling import views

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', views.index, name='home'),
    path('login/', views.log_in, name='login'),
    path('logout/', views.log_out, name='logout'),
    path('register/', views.register, name='register'),
    path('main_page/', views.main_page, name='main_page'),
    path('activate/<uidb64>/<token>', views.activate, name='activate'),
    path('login/forget_password/', views.forget_password, name='forget_password'),
    path('login/forget_password/new_password/', views.new_password, name='new_password'),
    path('login/forget_password/otp_confirmation/', views.otp_confirmation, name="otp_confirmation"),

]
