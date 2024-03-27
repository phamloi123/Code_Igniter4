<?php

namespace App\Service;

use App\Models\ProductsModel;
use App\Service\MenuService;
use App\Common\ResultUtils;
use Exception;

class ProductsService extends BaseService
{
    private $products;
    private $menu;
    function __construct()
    {
        parent::__construct();
        $this->products = new ProductsModel();
        $this->products->protect(false);
        $this->menu = new MenuService();
    }
    public function getAllProducts()
    {
        return $this->products->findAll();
    }
    public function getProductsByID($id)
    {
        return $this->products->where('id', $id)->first();
    }
    public function getProductsByDate()
    {
        return $this->products->orderBy('time', 'DESC')->limit(10)->findAll();
    }
    public function getProductsBySold()
    {
        return $this->products->orderBy('sold', 'DESC')->limit(10)->findAll();
    }

    //CẬP NHẬT SẢN PHẨM
    public function updateProInfo($requestData)
    {
        $validate = $this->validateUpdatePro($requestData);
        // dd($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors(),
            ];
        }

        $dataSave = $requestData->getPost();


        //CHANGE TIME FROM INPUT TO TIME IN DATABASE
        $time_from_input = $dataSave['time'];
        $time_for_db = date('Y-m-d H:i:s', strtotime($time_from_input));
        $dataSave['time'] = $time_for_db;

        //KIỂM TRA CÓ THAY ĐỔI ẢNH CHO SẢN PHẨM KHÔNG
        $file = $requestData->getFile('add_img');
        if ($file && $file->isValid()) {
            //CHANGE META
            //LẤY TÊN SẢN PHẨM
            $product_Name = $this->getProductName($dataSave['name']);

            //LẤY LOẠI CỦA SẢN PHẨM
            $products_Type = $this->menu->getMeta($dataSave['parent']);

            //LẤY LOẠI CỦA IMAGE
            if ($file->isValid()) {
                $fileType = $file->getClientMimeType(); // Lấy loại file
                //CẮT CHUỖI ĐỂ LẤY LOẠI ẢNH PNG/JPG/JPEG
                $fileType = explode('/', $fileType);
                $image_Type = end($fileType); // Lấy phần tử cuối cùng của mảng
            }

            //GIÁ TRỊ CỦA META
            $dataSave['meta'] = 'assets/img/' . $products_Type . '/' . $product_Name . '.' . $image_Type;

            //LƯU ẢNH VÀO THƯ MỤC
            $path = FCPATH . 'assets/img/' . $products_Type; // Đường dẫn đến thư mục đích

            // Kiểm tra nếu thư mục không tồn tại, tạo mới
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
            // Di chuyển file vào thư mục đích
            try {
                $file->move($path, $product_Name . '.' . $image_Type);
            } catch (Exception $e) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'messages' => [
                        'error' => $e->getMessage()
                    ],
                ];
            }
        }

        //LƯU DỮ LIỆU VÀO DATABASE
        $this->products->save($dataSave);
        try {
            $this->products->save($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => [
                    'success' => 'Cập nhật dữ liệu thành công!'
                ],
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => [
                    'error' => $e->getMessage()
                ],
            ];
        }
    }


    //XÓA SẢN PHẨM
    public function deleteProduct($id)
    {
        //LẤY META TRONG BẢNG CỦA SẢN PHẨM MUỐN XÓA
        $get_meta_pro = $this->products->select('meta')->where('id', $id)->get();
        if ($get_meta_pro->getNumRows() > 0) {
            $row = $get_meta_pro->getRow();
            $meta_pro_to_delete = $row->meta;
        } else {
            return null;
        }
        $fileToDelete = FCPATH . $meta_pro_to_delete; // Đường dẫn đến tệp cần xóa
        try {
            $this->products->delete($id);
            // Thực hiện xóa tệp
            unlink($fileToDelete);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => [
                    'success' => 'Cập nhật dữ liệu thành công!'
                ],
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => [
                    'error' => $e->getMessage()
                ],
            ];
        }
    }



    //THÊM SẢN PHẨM
    public function addProductsInfo($requestData)
    {
        $validate = $this->validateCreatePro($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors(),
            ];
        }
        $file = $requestData->getFile('add_img');

        if ($file && $file->isValid()) {
            $dataSave = $requestData->getPost();
            if ($file && $file->isValid()) {
                //CHANGE TIME FROM INPUT TO TIME IN DATABASE
                    $time_from_input = $dataSave['time'];
                    $time_for_db = date('Y-m-d H:i:s', strtotime($time_from_input));
                    $dataSave['time'] = $time_for_db;

                //CHANGE META
                    //LẤY TÊN SẢN PHẨM
                    $product_Name = $this->getProductName($dataSave['name']);

                    //LẤY LOẠI CỦA SẢN PHẨM
                    $products_Type = $this->menu->getMeta($dataSave['parent']);

                    //LẤY LOẠI CỦA IMAGE
                    if ($file->isValid()) {
                        $fileType = $file->getClientMimeType(); // Lấy loại file
                        //CẮT CHUỖI ĐỂ LẤY LOẠI ẢNH PNG/JPG/JPEG
                        $fileType = explode('/', $fileType);
                        $image_Type = end($fileType); // Lấy phần tử cuối cùng của mảng
                    }

                //GIÁ TRỊ CỦA META
                $dataSave['meta'] = 'assets/img/' . $products_Type . '/' . $product_Name . '.' . $image_Type;

                //LƯU ẢNH VÀO THƯ MỤC
                $path = FCPATH . 'assets/img/' . $products_Type; // Đường dẫn đến thư mục đích

                // Kiểm tra nếu thư mục không tồn tại, tạo mới
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                // Di chuyển file vào thư mục đích
                try {
                    $file->move($path, $product_Name . '.' . $image_Type);
                } catch (Exception $e) {
                    return [
                        'status' => ResultUtils::STATUS_CODE_ERR,
                        'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                        'messages' => [
                            'error' => $e->getMessage()
                        ],
                    ];
                }
            }
            $this->products->save($dataSave);
            try {
                $this->products->save($dataSave);
                return [
                    'status' => ResultUtils::STATUS_CODE_OK,
                    'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                    'messages' => [
                        'success' => 'Thêm sản phẩm thành công!'
                    ],
                ];
            } catch (Exception $e) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'messages' => [
                        'error' => $e->getMessage()
                    ],
                ];
            }
        } else {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => [
                    'success' => 'Vui lòng thêm ảnh cho sản phẩm!'
                ],
            ];
        }
    }



    //THAY ĐỔI TÊN CỦA SẢN PHẨM
    public function getProductName($name)
    {
        function removeAccents($str)
        {
            $accentedChars = array(
                'á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ',
                'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'đ', 'é', 'è', 'ẻ', 'ẽ',
                'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'í', 'ì', 'ỉ', 'ĩ',
                'ị', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ',
                'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ú', 'ù', 'ủ', 'ũ',
                'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'ý', 'ỳ', 'ỷ', 'ỹ',
                'ỵ', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ',
                'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Đ', 'É', 'È', 'Ẻ',
                'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'Í', 'Ì', 'Ỉ',
                'Ĩ', 'Ị', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ',
                'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ú', 'Ù', 'Ủ',
                'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'Ý', 'Ỳ', 'Ỷ',
                'Ỹ', 'Ỵ'
            );

            $unaccentedChars = array(
                'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
                'a', 'a', 'a', 'a', 'a', 'a', 'd', 'e', 'e', 'e', 'e',
                'e', 'e', 'e', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i',
                'i', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
                'o', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
                'u', 'u', 'u', 'u', 'u', 'u', 'u', 'y', 'y', 'y', 'y',
                'y', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A',
                'A', 'A', 'A', 'A', 'A', 'A', 'A', 'D', 'E', 'E', 'E',
                'E', 'E', 'E', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I',
                'I', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O',
                'O', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U',
                'U', 'U', 'U', 'U', 'U', 'U', 'U', 'Y', 'Y', 'Y', 'Y',
                'Y'
            );

            return str_replace($accentedChars, $unaccentedChars, $str);
        }
        $product_Name = removeAccents($name); //Xóa dấu tiếng việt
        $product_Name = str_replace(' ', '_', $product_Name); // Thay thế khoảng trắng bằng dấu gạch dưới
        $product_Name = strtolower($product_Name); // Chuyển đổi chuỗi thành chữ thường

        return $product_Name;
    }



    public function validateUpdatePro($requestData)
    {
        // dd($requestData->getFile('add_img'));
        $rule = [
            'name' => 'max_length[50]|min_length[6]|is_unique[products.name, id,' . $requestData->getPost()['id'] . ']',
            'view' => 'integer|required|numeric|greater_than_equal_to[0]|max_length[6]',
            'total' => 'integer|required|numeric|greater_than_equal_to[0]|max_length[6]',
            'sold' => 'integer|required|numeric|greater_than_equal_to[0]|max_length[9]',
            'price' => 'integer|required|numeric|greater_than[0]|max_length[9]',
            'sale' => 'integer|required|numeric|greater_than_equal_to[0]|max_length[9]|less_than[price]',
            'meta' => 'required|max_length[80]',
            'time' => 'required',
            'detail' => 'max_length[2000]|min_length[6]'
        ];
        if ($requestData->getFile("add_img")) {
            $rule['add_img'] = 'max_size[add_img,10240]|is_image[add_img]|ext_in[add_img,jpg,jpeg,png]';
        }
        $message = [
            'name' => [
                'max_length' => 'Tên sản phẩm không được vượt quá {param} kí tự!',
                'min_length' => 'Tên sản phẩm không được ít hơn {param} kí tự!',
                'is_unique' => 'Tên sản phẩm đã tồn tại. Vui lòng chọn tên khác!'
            ],
            'view' => [
                'max_length' => 'View không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập số lượng view! (có thể nhập 0)',
                'numeric' => 'View chỉ nhận định dạng số!',
                'greater_than_equal_to' => 'View không thể là số âm!',
                'integer' => 'View phải là một số nguyên!',
            ],
            'total' => [
                'max_length' => '"Số lượng" không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập số lượng sản phẩm! (có thể nhập 0)',
                'numeric' => '"Số lượng" phải thuộc định dạng số!',
                'greater_than_equal_to' => '"Số lượng" không thể là số âm!',
                'integer' => '"Số lượng" phải là một số nguyên!',
            ],
            'sold' => [
                'max_length' => '"Số sản phẩm đã bán" không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập số lượng sản phẩm đã bán ra! (có thể nhập 0)',
                'numeric' => '"Số lượng đã bán" phải thuộc định dạng số!',
                'greater_than_equal_to' => '"Số sản phẩm đã bán" không thể là số âm!',
                'integer' => '"Số sản phẩm đã bán" phải là một số nguyên!',
            ],
            'price' => [
                'max_length' => '"Giá bán" không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập giá sản phẩm!',
                'numeric' => '"Giá bán" phải thuộc định dạng số!',
                'greater_than' => '"Giá bán" phải luôn lớn hơn 0!',
                'integer' => '"Giá bán" phải là một số nguyên!',
            ],
            'sale' => [
                'max_length' => '"Giám giá" không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập giá giảm của sản phẩm! (có thể bằng 0)',
                'numeric' => '"Giảm giá" phải thuộc định dạng số!',
                'greater_than_equal_to' => '"Giảm giá" phải luôn lớn hơn hoặc bằng 0!',
                'integer' => '"Giảm giá" phải là một số nguyên!',
                'less_than' => '"Giảm giá" thấp hơn "Giá bán"!',
            ],
            'meta' => [
                'max_length' => '"meta" không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập meta sản phẩm!',
            ],
            'time' => [
                'required' => 'Xin vui lòng nhập thời gian của sản phẩm!',
            ],
            'detail' => [
                'max_length' => '"Chi tiết sản phẩm" không được vượt quá {param} kí tự!',
                'min_length' => '"Chi tiết sản phẩm" không thể nhỏ hơn {param} kí tự!',
            ],
            'add_img' => [
                'max_size' => 'Kích thước hình ảnh không được vượt quá 10MB!',
                'is_image' => 'Tệp vừa chọn không đúng định dạng hình ảnh!',
                'ext_in' => 'Chỉ chấp nhận các định dạng hình ảnh JPG, JPEG, PNG.',
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }

    public function validateCreatePro($requestData)
    {
        // dd($requestData->getFile('add_img'));
        $rule = [
            'name' => 'max_length[50]|min_length[6]|is_unique[products.name]',
            'view' => 'required|integer|numeric|greater_than_equal_to[0]|max_length[6]',
            'total' => 'integer|required|numeric|greater_than_equal_to[0]|max_length[6]',
            'sold' => 'integer|required|numeric|greater_than_equal_to[0]|max_length[9]',
            'price' => 'integer|required|numeric|greater_than[0]|max_length[9]',
            'sale' => 'integer|required|numeric|greater_than_equal_to[0]|max_length[9]|less_than[price]',
            'time' => 'required',
            'detail' => 'max_length[2000]|min_length[6]'
        ];
        if ($requestData->getFile("add_img")) {
            $rule['add_img'] = 'max_size[add_img,10240]|is_image[add_img]|ext_in[add_img,jpg,jpeg,png]';
        }
        $message = [
            'name' => [
                'max_length' => 'Tên sản phẩm không được vượt quá {param} kí tự!',
                'min_length' => 'Tên sản phẩm không được ít hơn {param} kí tự!',
                'is_unique' => 'Tên sản phẩm đã tồn tại. Vui lòng chọn tên khác!'
            ],
            'view' => [
                'max_length' => 'View không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập số lượng view! (có thể nhập 0)',
                'numeric' => 'View chỉ nhận định dạng số!',
                'greater_than_equal_to' => 'View không thể là số âm!',
                'integer' => 'View phải là một số nguyên!',
            ],
            'total' => [
                'max_length' => '"Số lượng" không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập số lượng sản phẩm! (có thể nhập 0)',
                'numeric' => '"Số lượng" phải thuộc định dạng số!',
                'greater_than_equal_to' => '"Số lượng" không thể là số âm!',
                'integer' => '"Số lượng" phải là một số nguyên!',
            ],
            'sold' => [
                'max_length' => '"Số sản phẩm đã bán" không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập số lượng sản phẩm đã bán ra! (có thể nhập 0)',
                'numeric' => '"Số lượng đã bán" phải thuộc định dạng số!',
                'greater_than_equal_to' => '"Số sản phẩm đã bán" không thể là số âm!',
                'integer' => '"Số sản phẩm đã bán" phải là một số nguyên!',
            ],
            'price' => [
                'max_length' => '"Giá bán" không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập giá sản phẩm!',
                'numeric' => '"Giá bán" phải thuộc định dạng số!',
                'greater_than' => '"Giá bán" phải luôn lớn hơn 0!',
                'integer' => '"Giá bán" phải là một số nguyên!',
            ],
            'sale' => [
                'max_length' => '"Giám giá" không được vượt quá {param} kí tự!',
                'required' => 'Xin vui lòng nhập giá giảm của sản phẩm! (có thể bằng 0)',
                'numeric' => '"Giảm giá" phải thuộc định dạng số!',
                'greater_than_equal_to' => '"Giảm giá" phải luôn lớn hơn hoặc bằng 0!',
                'integer' => '"Giảm giá" phải là một số nguyên!',
                'less_than' => '"Giảm giá" thấp hơn "Giá bán"!',
            ],
            'time' => [
                'required' => 'Xin vui lòng nhập thời gian của sản phẩm!',
            ],
            'detail' => [
                'max_length' => '"Chi tiết sản phẩm" không được vượt quá {param} kí tự!',
                'min_length' => '"Chi tiết sản phẩm" không thể nhỏ hơn {param} kí tự!',
            ],
            'add_img' => [
                'max_size' => 'Kích thước hình ảnh không được vượt quá 10MB!',
                'is_image' => 'Tệp vừa chọn không đúng định dạng hình ảnh!',
                'ext_in' => 'Chỉ chấp nhận các định dạng hình ảnh JPG, JPEG, PNG.',
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
}
