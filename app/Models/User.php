<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TotalInstallmentAmount;
use App\Models\Installment;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // protected $appends = [
    //     'profile_photo_url',
    // ];


    public function totalNoOfInstallment()
    {
        return $this->hasOne(TotalInstallmentAmount::class,'user_id','id');
    }

    public function installment()
    {

        return $this->hasMany(Installment::class,'user_id','id');
    }
    public function installment_year()
    {

        return $this->hasOne(InstallmentYear::class,'user_id','id');
    }

    public function afterHandOverMoney()
    {
        return $this->hasOne(AfterHandoverMoney::class);
    }

    public function bookingStatus()
    {
        return $this->hasOne(BookingStatus::class);
    }

    public function buildingPilling()
    {
        return $this->hasOne(BuildingPillingStatus::class);
    }

    public function carParking()
    {
        return $this->hasOne(CarParkingStatus::class);
    }

    public function downPayment()
    {
        return $this->hasOne(DownpaymentStatus::class);
    }

    public function finishingWork()
    {
        return $this->hasOne(FinishingWorkStatus::class);
    }

    public function floorRoof()
    {
        return $this->hasOne(FloorRoofCasting1st::class);
    }

    public function landFilling1()
    {
        return $this->hasOne(LandFillingStatus1st::class);
    }

    public function landFilling2()
    {
        return $this->hasOne(LandFillingStatus2nd::class);
    }
    public function totalAmount()
    {
        return $this->hasOne(TotalAmount::class);
    }
    public function approveUpdate()
    {
        return $this->hasOne(ApproveUpdate::class);
    }

    //new add
    public function broker(){
        return $this->hasOne(Broker::class);
    }



}
