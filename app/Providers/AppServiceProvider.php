<?php

namespace App\Providers;

use App\Decorators\ActivateBill\ActivateBillDecorator;
use App\Decorators\ActivateBill\ActivateBillTransaction;
use App\Decorators\ActivateBill\CancelBillDecorator;
use App\Decorators\ActivateBill\CancelBillTransaction;
use App\Decorators\ActivateBill\Eloquent\EloquentActivateBill\Transaction\EloquentActivateBillTransaction;
use App\Decorators\ActivateBill\Eloquent\EloquentActivateBill\ValidateShipperDecorator;
use App\Decorators\ActivateBill\Eloquent\EloquentActivateBillDecorator;
use App\Decorators\ActivateBill\Eloquent\EloquentCancelBill\Transaction\EloquentCancelBillTransaction;
use App\Decorators\ActivateBill\Eloquent\EloquentCancelBill\ReturnProductsDecorator;
use App\Decorators\CreateProduct\CreateProductTransaction;
use App\Decorators\CreateProduct\Eloquent\AddInventoryDecorator;
use App\Decorators\CreateProduct\Eloquent\Transaction\EloquentCreateProductTransaction;
use App\Decorators\ExportProduct\ConfirmExportProductTransaction;
use App\Decorators\ExportProduct\Eloquent\EloquentConfirmBillDone\DoneStateDecorator;
use App\Decorators\ExportProduct\Eloquent\EloquentConfirmBillDone\CheckReleaseShipperDecorator;
use App\Decorators\ExportProduct\Eloquent\EloquentConfirmBillDone\Transaction\EloquentConfirmExportProductTransaction;
use App\Decorators\ExportProduct\Eloquent\EloquentExportProduct\Transaction\EloquentExportProductTransaction;
use App\Decorators\ExportProduct\Eloquent\EloquentExportProduct\OnShippingStateDecorator;
use App\Decorators\ExportProduct\ExportProductTransaction;
use App\Decorators\ImportProduct\Eloquent\Transaction\EloquentImportProductTransaction;
use App\Decorators\ImportProduct\Eloquent\UpdateProductQuantityDecorator;
use App\Decorators\ImportProduct\ImportProductTransaction;
use App\Decorators\PurchaseProduct\Eloquent\Transaction\EloquentPurchaseProductTransaction;
use App\Decorators\PurchaseProduct\Eloquent\MakeBillDecorator;
use App\Decorators\PurchaseProduct\PurchaseProductDecorator;
use App\Decorators\CreateProduct\CreateProductDecorator;
use App\Decorators\ExportProduct\ConfirmExportProductDecorator;
use App\Decorators\ExportProduct\ExportProductDecorator;
use App\Decorators\FindShipper\EloquentFindShipper\EloquentFindShipper;
use App\Decorators\FindShipper\FindShipperDecorator;
use App\Decorators\PurchaseProduct\PurchaseProductTransaction;
use App\Decorators\Statistic\Eloquent\EloquentMostImported;
use App\Decorators\Statistic\Eloquent\EloquentMostPurchased;
use App\Decorators\Statistic\MostImported;
use App\Decorators\Statistic\MostPurchased;
use App\Proxies\ActivateBill\ActivateBillProxy;
use App\Proxies\ActivateBill\CancelBillProxy;
use App\Proxies\ActivateBill\Eloquent\EloquentActivateBillProxy;
use App\Proxies\ActivateBill\Eloquent\EloquentCancelBillProxy;
use App\Proxies\ExportProduct\ConfirmExportProductProxy;
use App\Proxies\ExportProduct\Eloquent\EloquentConfirmExportProductProxy;
use App\Proxies\ExportProduct\Eloquent\EloquentExportProductProxy;
use App\Proxies\ExportProduct\ExportProductProxy;
use App\Proxies\PurchaseProduct\Eloquent\EloquentPurchaseProductProxy;
use App\Proxies\PurchaseProduct\PurchaseProductProxy;
use App\Repositories\AuctionProductRepository;
use App\Repositories\AuctionRepository;
use App\Repositories\BillDetailRepository;
use App\Repositories\BillRepository;
use App\Repositories\CardRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\Eloquent\EloquentAuctionProductRepository;
use App\Repositories\Eloquent\EloquentAuctionRepository;
use App\Repositories\Eloquent\EloquentBillDetailRepository;
use App\Repositories\Eloquent\EloquentBillRepository;
use App\Repositories\Eloquent\EloquentCardRepository;
use App\Repositories\Eloquent\EloquentCategoryRepository;
use App\Repositories\Eloquent\EloquentCommentRepository;
use App\Repositories\Eloquent\EloquentExportBillRepository;
use App\Repositories\Eloquent\EloquentImageRepository;
use App\Repositories\Eloquent\EloquentImportBillRepository;
use App\Repositories\Eloquent\EloquentInventoryRepository;
use App\Repositories\Eloquent\EloquentProducerRepository;
use App\Repositories\Eloquent\EloquentProductRepository;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\EloquentRoleRepository;
use App\Repositories\Eloquent\EloquentShipperRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Repositories\ExportBillRepository;
use App\Repositories\ImageRepository;
use App\Repositories\ImportBillRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\ProducerRepository;
use App\Repositories\ProductRepository;
use App\Repositories\Repository;
use App\Repositories\RoleRepository;
use App\Repositories\ShipperRepository;
use App\Repositories\UserRepository;
use App\Services\AuctionProductService;
use App\Services\AuctionService;
use App\Services\BillDetailService;
use App\Services\BillService;
use App\Services\CardService;
use App\Services\CategoryService;
use App\Services\CommentService;
use App\Decorators\ImportProduct\ImportProductDecorator;
use App\Services\Eloquent\EloquentAuctionProductService;
use App\Services\Eloquent\EloquentAuctionService;
use App\Services\Eloquent\EloquentBillDetailService;
use App\Services\Eloquent\EloquentBillService;
use App\Services\Eloquent\EloquentCardService;
use App\Services\Eloquent\EloquentCategoryService;
use App\Services\Eloquent\EloquentCommentService;
use App\Services\Eloquent\EloquentExportBillService;
use App\Services\Eloquent\EloquentImageService;
use App\Services\Eloquent\EloquentImportBillService;
use App\Services\Eloquent\EloquentInventoryService;
use App\Services\Eloquent\EloquentProducerService;
use App\Services\Eloquent\EloquentProductService;
use App\Services\Eloquent\EloquentRoleService;
use App\Services\Eloquent\EloquentService;
use App\Services\Eloquent\EloquentShipperService;
use App\Services\Eloquent\EloquentUserService;
use App\Services\ExportBillService;
use App\Services\ImageService;
use App\Services\ImportBillService;
use App\Services\InventoryService;
use App\Services\ProducerService;
use App\Services\ProductService;
use App\Services\RoleService;
use App\Services\Service;
use App\Services\ShipperService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Image;
use App\Models\Category;
use App\Models\Producer;
use App\Models\Role;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);



//       $producer['listProducer'] = Producer::all();
//       $cate['listCate'] = Category::all();
//       $image['listImage'] = Image::all();
//       $role['listRole'] = Role::all();
//       View::share($image);
//       View::share($cate);
//       View::share($producer);
//       View::share($role);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(Repository::class, EloquentRepository::class);
        $this->app->singleton(UserRepository::class, EloquentUserRepository::class);
        $this->app->singleton(RoleRepository::class, EloquentRoleRepository::class);
        $this->app->singleton(ImageRepository::class, EloquentImageRepository::class);
        $this->app->singleton(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->singleton(ProducerRepository::class, EloquentProducerRepository::class);
        $this->app->singleton(ShipperRepository::class, EloquentShipperRepository::class);
        $this->app->singleton(ProductRepository::class, EloquentProductRepository::class);
        $this->app->singleton(CommentRepository::class, EloquentCommentRepository::class);
        $this->app->singleton(BillDetailRepository::class, EloquentBillDetailRepository::class);
        $this->app->singleton(BillRepository::class, EloquentBillRepository::class);
        $this->app->singleton(ExportBillRepository::class, EloquentExportBillRepository::class);
        $this->app->singleton(ImportBillRepository::class, EloquentImportBillRepository::class);
        $this->app->singleton(InventoryRepository::class, EloquentInventoryRepository::class);
        $this->app->singleton(AuctionRepository::class, EloquentAuctionRepository::class);
        $this->app->singleton(AuctionProductRepository::class, EloquentAuctionProductRepository::class);
        $this->app->singleton(CardRepository::class, EloquentCardRepository::class);

        $this->app->singleton(Service::class, EloquentService::class);
        $this->app->singleton(UserService::class, EloquentUserService::class);
        $this->app->singleton(RoleService::class, EloquentRoleService::class);
        $this->app->singleton(ImageService::class, EloquentImageService::class);
        $this->app->singleton(CategoryService::class, EloquentCategoryService::class);
        $this->app->singleton(ProducerService::class, EloquentProducerService::class);
        $this->app->singleton(ShipperService::class, EloquentShipperService::class);
        $this->app->singleton(ProductService::class, EloquentProductService::class);
        $this->app->singleton(CommentService::class, EloquentCommentService::class);
        $this->app->singleton(BillDetailService::class, EloquentBillDetailService::class);
        $this->app->singleton(BillService::class, EloquentBillService::class);
        $this->app->singleton(ExportBillService::class, EloquentExportBillService::class);
        $this->app->singleton(ImportBillService::class, EloquentImportBillService::class);
        $this->app->singleton(InventoryService::class, EloquentInventoryService::class);
        $this->app->singleton(AuctionService::class, EloquentAuctionService::class);
        $this->app->singleton(AuctionProductService::class, EloquentAuctionProductService::class);
        $this->app->singleton(CardService::class, EloquentCardService::class);

        $this->app->singleton(CreateProductDecorator::class, AddInventoryDecorator::class);
        $this->app->singleton(ImportProductDecorator::class, UpdateProductQuantityDecorator::class);
        $this->app->singleton(PurchaseProductDecorator::class, MakeBillDecorator::class);
        $this->app->singleton(ActivateBillDecorator::class, ValidateShipperDecorator::class);
        $this->app->singleton(CancelBillDecorator::class, ReturnProductsDecorator::class);
        $this->app->singleton(FindShipperDecorator::class, EloquentFindShipper::class);
        $this->app->singleton(ExportProductDecorator::class, OnShippingStateDecorator::class);
        $this->app->singleton(ConfirmExportProductDecorator::class, CheckReleaseShipperDecorator::class);

        $this->app->singleton(CreateProductTransaction::class, EloquentCreateProductTransaction::class);
        $this->app->singleton(ImportProductTransaction::class, EloquentImportProductTransaction::class);
        $this->app->singleton(PurchaseProductTransaction::class, EloquentPurchaseProductTransaction::class);
        $this->app->singleton(ActivateBillTransaction::class, EloquentActivateBillTransaction::class);
        $this->app->singleton(CancelBillTransaction::class, EloquentCancelBillTransaction::class);
        $this->app->singleton(ExportProductTransaction::class, EloquentExportProductTransaction::class);
        $this->app->singleton(ConfirmExportProductTransaction::class, EloquentConfirmExportProductTransaction::class);

        $this->app->singleton(ActivateBillProxy::class, EloquentActivateBillProxy::class);
        $this->app->singleton(CancelBillProxy::class, EloquentCancelBillProxy::class);
        $this->app->singleton(PurchaseProductProxy::class, EloquentPurchaseProductProxy::class);
        $this->app->singleton(ExportProductProxy::class, EloquentExportProductProxy::class);
        $this->app->singleton(ConfirmExportProductProxy::class, EloquentConfirmExportProductProxy::class);

        $this->app->singleton(MostImported::class, EloquentMostImported::class);
        $this->app->singleton(MostPurchased::class, EloquentMostPurchased::class);
    }
}
