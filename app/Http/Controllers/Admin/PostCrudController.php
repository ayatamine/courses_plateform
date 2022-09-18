<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('post', 'posts');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::column('title');
        CRUD::column('title_en');
        CRUD::addColumn([
            'name'      => 'thumbnail', // The db column name
            'label'     => 'Thumbnail', // Table column heading
            'type'      => 'image',   
        ]);
        CRUD::addColumn([
            // 1-n relationship
            'label'     => 'Category', // Table column heading
            'entity'    => 'category', // the method that defines the relationship in your Model
            'model'     => "App\Models\Category", // foreign key model
        ]);
        
        // CRUD::column('category_id');
        // CRUD::column('postable_id');
        // CRUD::column('postable_type');
        CRUD::addColumn([
            'label'     => 'Writer', // Table column heading
            'type'      => 'select',
            'name'      => 'postable_id', // the column that contains the ID of that connected entity;
            'key'       => 'id', // the column that contains the ID of that connected entity;
            'entity'    => 'postable', // the method that defines the relationship in your Model
            'attribute' => 'full_name', // foreign key attribute that is shown to user
        ]);
        CRUD::addColumn([
            'name'  => 'published',
            'label' => 'published',
            'type'  => 'boolean',  
        ]);
        CRUD::column('keywords');
      

        CRUD::column('created_at');
        CRUD::column('updated_at');
        CRUD::column('deleted_at');


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostRequest::class);

        CRUD::field('title');
        CRUD::field('title_en');
        CRUD::addField([
            'name'      => 'thumbnail', // The db column name
            'label'     => 'Thumbnail', // Table column heading
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'local', 
        ]);
        
        CRUD::field('content')->type('summernote');
        CRUD::field('content_en')->type('summernote');
        CRUD::field('category_id');
        CRUD::addField([
            'label'     => 'Writer',
            'type'      => 'select',
            'name'      => 'postable_id', // the db column for the foreign key
            'entity'    => false, // the method that defines the relationship in your Model
            'model'     => "App\Models\Admin",
            'attribute' => 'full_name',
            'options'   => (function ($query) {
                return $query->orderBy('first_name', 'ASC')->get();
            }),  
        ]);
        CRUD::addField([
            'name' => 'postable_type',
            'label' => 'Postable Type',
            'type'  => 'select_from_array',
            'options'     => ['App\Models\Admin' => 'Admin', 'App\Models\Instructor' => 'Instructor'],
            'allows_null' => false,
            'default'     => 'App\Models\Admin',
        ]);
        CRUD::field('keywords');
        CRUD::field('published');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    /**
     * Define what happens when the Show operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-show
     * @return void
     */
    protected function setupShowOperation()
    {
        $this->setupListOperation();
        CRUD::column('title')->beforeColumn('title_en');
        CRUD::addColumn([
            'name' => 'content',
            'type' => 'textarea',
            'escaped' => false,
        ]);
        CRUD::addColumn([
            'name' => 'content',
            'type' => 'textarea',
            'escaped' => false,
        ])->beforeColumn('keywords');
        CRUD::addColumn([
            'name' => 'content_en',
            'type' => 'textarea',
            'escaped' => false,
        ])->beforeColumn('keywords');
    }
}
