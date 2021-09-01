<?php

use App\Http\Controllers\UserPage\ReferralController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TickerController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Auction\BuyTokenController;
use App\Http\Controllers\Auction\LotAuctionController;
use App\Http\Controllers\Auction\ActiveLotBetController;
use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Admin\EditBDController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\UserPage\UserHomeController;
use App\Http\Controllers\UserPage\UserProfileController;
use App\Http\Controllers\UserPage\UserResetAuthDataController;
use App\Http\Controllers\UserPage\BlogController;
use App\Http\Controllers\UserPage\UserTokensController;
use App\Http\Controllers\GuestsNewsController;
use App\Http\Controllers\ReplenishmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [IndexController::class, 'index'])->name('/');

// LogIn Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('auth');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('acceptrepassword');

//for chat ajax
Route::get('/sendMessageAjax', [ChatController::class, 'sendMessageAjax']);
Route::get('/realTime', [ChatController::class, 'realTime']);
Route::get('/editMessageAjax', [ChatController::class, 'editMessageAjax']);
Route::get('/deleteMessageAjax', [ChatController::class, 'deleteMessageAjax']);

// for token operation
Route::post('/sendAjaxBuyNewToken', [BuyTokenController::class, 'BuyNewToken']);
Route::get('/sendAjaxCreateLot', [LotAuctionController::class, 'CreateLot']);
Route::get('/betOnPassAuction', [LotAuctionController::class, 'betOnPassAuction']);
Route::get('/betOnActAuction', [ActiveLotBetController::class, 'betOnActAuction']);

// Routes for connection admin...authenticate
Route::get('d822638c-a4e7-11eb-afe6-0242ac190003-invest-login', [AdminLoginController::class, 'showLoginForm']);
Route::post('d822638c-a4e7-11eb-afe6-0242ac190003-invest-login', [AdminLoginController::class, 'authenticate'])->name('login.admin');

// Routes for admin..

Route::middleware(['admin'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'] , function () {

        Route::get('/', [PanelController::class, 'index'])->name('admin');
        Route::resource('posts', PostController::class);
        Route::resource('ticker', TickerController::class)->only('index', 'store');
        Route::put('ticker-update/{ticker}', [TickerController::class, 'togged'])->name('ticker.togged');
        Route::group(['prefix' => 'tokens', 'as' => 'tokens.'], function () {
            Route::get('own-tokens', [TokenController::class, 'adminOwnTokens'])->name('own-tokens');
            Route::get('not-active-lot', [TokenController::class, 'notActiveLot'])->name('not-active-lot');
        });

        Route::group(['prefix' => 'statistics', 'as' => 'statistics.'], function () {
            Route::get('auction-history', [StatisticsController::class, 'auctionHistory'])->name('auction-history');
        });


        Route::group(['prefix' => 'edit-BD', 'as' => 'edit-BD.'], function () {
            Route::get('own-tokens', [EditBDController::class, 'BDOwnTokens'])->name('own-tokens');
            Route::get('investor-budget', [EditBDController::class, 'InvestorBudget'])->name('investor-budget');
        });


       // Route::get('/ourEvent', [PanelController::class, 'ourEventShow'])->name('ourEvent.show');
    });
});

// Routes for User
Route::group(['prefix' => 'cabinet', 'middleware' => ['auth', 'home']], function () {
    Route::get('/', [UserHomeController::class, 'index'])->name('cabinet');

    Route::get('profile{user}', [UserProfileController::class, 'showProfile'])->name('profile');
    Route::post('profile', [UserProfileController::class, 'editProfile'])->name('edit-profile');


    Route::get('referrals/structure', [ReferralController::class, 'structure'])->name('referrals.structure');
    Route::get('referrals/banners', [ReferralController::class, 'banners']);
    Route::get('referrals/privateChat', [ReferralController::class, 'privateChat']);
    Route::get('referrals/activeTeam', [ReferralController::class, 'activeTeam'])->name('activeTeam');
    Route::get('referrals/referralForm', [ReferralController::class, 'referralForm']);


    Route::get('edit-auth', [UserResetAuthDataController::class, 'showResetAuthData']);
    Route::post('edit-auth/nickname', [UserResetAuthDataController::class, 'updateNickName'])->name('updateNickName');
    Route::post('edit-auth/email', [UserResetAuthDataController::class, 'updateEmail'])->name('updateEmail');
    Route::post('edit-auth/pass', [UserResetAuthDataController::class, 'changePassword'])->name('changePassword');
    Route::get('finances/paymentSystems/payeer', [UserHomeController::class, 'payeer'])->name('payeer');
    Route::get('finances/paymentSystems/paypal', [UserHomeController::class, 'paypal'])->name('paypal');
    Route::get('finances/paymentSystems/skrill', [UserHomeController::class, 'skrill'])->name('skrill');

    Route::get('finances/paymentSystems/24paybank', [UserHomeController::class, 'paybank'])->name('paybank');
    Route::get('finances/paymentSystems/kuna', [UserHomeController::class, 'kuna'])->name('kuna');
    Route::get('finances/paymentSystems/bestChange', [UserHomeController::class, 'bestChange'])->name('bestChange');

    Route::get('finances/homeFinance', [UserHomeController::class, 'homeFinance'])->name('homeFinance');
    Route::get('finances/withdrawFunds', [UserHomeController::class, 'withdrawFunds'])->name('withdrawFunds');
    Route::get('finances/replenishment', 'UserHomeController@replenishment')->name('replenishment');
    Route::get('finances/transactionHistory', [UserHomeController::class, 'transactionHistory'])->name('transactionHistory');
    Route::get('finances/rewardHistory', [UserHomeController::class, 'rewardHistory'])->name('rewardHistory');
    Route::get('finances/accountsWallets', [UserHomeController::class, 'accountsWallets'])->name('accountsWallets');
    Route::get('tokens/referrals-tokens', [UserTokensController::class, 'referralsTokens']);
    Route::get('tokens/own-tokens', [UserTokensController::class, 'ownTokens']);
    Route::get('tokens/noActive-lots', [UserTokensController::class, 'noActive']);
    Route::get('tokens/active-lots', [UserTokensController::class, 'activeLots']);
    Route::get('tokens/history-trades', [UserTokensController::class, 'historyTrades']);
    Route::get('tokens/history-referral-Lot', [UserTokensController::class, 'historyReferralLot']);
    Route::get('/management/{category}/{post?}', [BlogController::class, 'management']);
});


// Routes for guest...
Route::get('/management/{category}/{post?}', [GuestsNewsController::class, 'managementG']);
Route::get('rules', [IndexController::class, 'siteRules']);
Route::get('contact', [IndexController::class, 'contact']);


Route::get('aboutUs/affiliate-program', [IndexController::class, 'affilProg']);
Route::get('aboutUs/user-agreement', [IndexController::class, 'UserAgree']);
Route::get('aboutUs/chat', [IndexController::class, 'chat']);
Route::get('aboutUs/networks', 'IndexController@networks');

Route::get('finances/chargeable-systems', [IndexController::class, 'chargeableSystems']);
Route::get('finances/multicurrency', [IndexController::class, 'multicurrency']);
Route::get('finances/tokenPrice', [IndexController::class, 'tokenPrice']);
Route::get('finances/tokenAuction', [IndexController::class, 'tokenAuction']);
Route::get('finances/protection-fund', [IndexController::class, 'protectionFund']);
Route::get('finances/investment-portfolio', [IndexController::class, 'investmentPortfolio']);
Route::get('finances/type-investment-rewards', [IndexController::class, 'typeRewards']);
Route::get('finances/dividends', [IndexController::class, 'dividends']);
Route::get('finances/referralReward', [IndexController::class, 'referralReward']);
Route::get('finances/typesOfInvestmentRewards', [IndexController::class, 'typesOfInvestmentRewards']);

Route::get('security/part-1', [IndexController::class, 'part_1']);
Route::get('security/part-2', [IndexController::class, 'part_2']);
Route::get('security/part-3', [IndexController::class, 'part_3']);
Route::get('security/part-4', [IndexController::class, 'part_4']);


//Payment
Route::get('/payment/', [ReplenishmentController::class,'index']);
Route::get('payment/{pms}', [ReplenishmentController::class, 'setPayment']);




