<?php
/**
 * 简单验证码识别
 * @author zhjx922
 */

class Vcode{

    //字符特征码
    private $_wordKeys = array (
        'A' => '000**00000****000**00**0**0000****0000****0000************0000****0000****0000**',
        'B' => '******00**000**0**0000****000**0******00**000**0**0000****0000****000**0******00',
        'C' => '00*****00**000****00000***000000**000000**000000**000000**00000*0**000**00*****0',
        'D' => '******00**000**0**0000****0000****0000****0000****0000****0000****000**0******00',
        'E' => '*********00000**00000**00000******0**00000**00000**00000**00000*******',
        'F' => '**********000000**000000**000000******00**000000**000000**000000**000000**000000',
        'G' => '00*****00**000****000000**000000**000000**000*****0000****0000**0**000**00*****0',
        'H' => '**0000****0000****0000****0000************0000****0000****0000****0000****0000**',
        'I' => '******00**0000**0000**0000**0000**0000**0000**0000**00******',
        'J' => '00****0000**0000**0000**0000**0000**0000***000****0**00***00',
        'K' => '**0000****000**0**00**00**0**000****0000****0000**0**000**00**00**000**0**0000**',
        'L' => '**00000**00000**00000**00000**00000**00000**00000**00000**00000*******',
        'M' => '**0000*****00*************0**0****0**0****0**0****0000****0000****0000****0000**',
        'N' => '**0000*****000******00******00****0**0****0**0****00******000*****000*****0000**',
        'P' => '*******0**0000****0000****0000*********0**000000**000000**000000**000000**000000',
        'Q' => '00****000**00**0**0000****0000****0000****0000****0**0****00****0**00**000****0*',
        'R' => '*******0**0000****0000****0000*********0*****000**00**00**000**0**0000****0000**',
        'S' => '0******0**0000****000000**0000000******0000000**000000**000000****0000**0******0',
        'T' => '********000**000000**000000**000000**000000**000000**000000**000000**000000**000',
        'U' => '**0000****0000****0000****0000****0000****0000****0000****0000**0**00**000****00',
        'V' => '**0000****0000****0000**0**00**00**00**00**00**000****0000****00000**000000**000',
        'W' => '**0000****0000****0000****0000****0**0****0**0****0**0*************00*****0000**',
        'X' => '**0000****0000**0**00**000****00000**000000**00000****000**00**0**0000****0000**',
        'Y' => '**0000****0000**0**00**000****00000**000000**000000**000000**000000**000000**000',
        'Z' => '*******00000**00000**0000**0000**0000**0000**0000**00000**00000*******',
        'a' => '00*****00**000**000000**0*********0000****000***0****0**',
        'b' => '**000000**000000**000000**0***00***00**0**0000****0000****0000*****00**0**0***00',
        'c' => '00*****00**000****000000**000000**0000000**000**00*****0',
        'd' => '000000**000000**000000**00***0**0**00*****0000****0000****0000**0**00***00***0**',
        'e' => '00****000**00**0**0000************0000000**000**00*****0',
        'f' => '000****000**00**00**00**00**000000**0000******0000**000000**000000**000000**0000',
        'g' => '0*****0***000*****000**0**000**00*****00**0000000******0**0000**0******0',
        'h' => '**000000**000000**000000**0***00***00**0**0000****0000****0000****0000****0000**',
        'i' => '00**0000**000000000***0000**0000**0000**0000**0000**00******',
        'k' => '**00000**00000**00000**00**0**0**00****000****000**0**00**00**0**000**',
        'l' => '***00**00**00**00**00**00**00**00**0****',
        'm' => '*0**0**0**0**0****0**0****0**0****0**0****0**0****0**0**',
        'n' => '**0***00***00**0**0000****0000****0000****0000****0000**',
        'o' => '00****000**00**0**0000****0000****0000**0**00**000****00',
        'p' => '**0***00***00**0**0000****0000****0000*****00**0**0***00**000000**000000',
        'q' => '00***0**0**00*****0000****0000****0000**0**00***00***0**000000**000000**',
        'r' => '**0****00***00**0**000000**000000**000000**000000**00000',
        's' => '0******0**0000****0000000******0000000****0000**0******0',
        't' => '00**000000**0000******0000**000000**000000**000000**000000**00**000****0',
        'u' => '**0000****0000****0000****0000****0000**0**00***00***0**',
        'v' => '**0000****0000**0**00**00**00**000****0000****00000**000',
        'w' => '**0000****0000****0**0****0**0****0**0**********0**00**0',
        'x' => '**0000**0**00**000****00000**00000****000**00**0**0000**',
        'y' => '**0000****0000****0000****0000****0000**0**00***00***0***00000**0******0',
        'z' => '******0000**000**000**000**000**0000******',
        '0' => '000**00000****000**00**0**0000****0000****0000****0000**0**00**000****00000**000',
        '1' => '00**000***00****0000**0000**0000**0000**0000**0000**00******',
        '2' => '00****000**00**0**0000**000000**00000**00000**00000**00000**00000**00000********',
        '3' => '0*****00**000**0000000**00000**0000***0000000**0000000**000000****000**00*****00',
        '4' => '00000**00000***0000****000**0**00**00**0**000**0********00000**000000**000000**0',
        '5' => '*******0**000000**000000**0***00***00**0000000**000000****0000**0**00**000****00',
        '6' => '00****000**00**0**0000*0**000000**0***00***00**0**0000****0000**0**00**000****00',
        '7' => '********000000**000000**00000**00000**00000**00000**00000**00000**000000**000000',
        '8' => '00****000**00**0**0000**0**00**000****000**00**0**0000****0000**0**00**000****00',
        '9' => '00****000**00**0**0000****0000**0**00***00***0**000000**0*0000**0**00**000****00',
    );

    /**
     * 生成验证码
     * @author 武老师
     */
    public function make($verCode = '') {
        if(empty($verCode)) {
            $baseChars     = 'ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghigklmnopqrstuvwxyz0123456789';
            $verCode       = '';
            $codeCharLenth = 4;
            for ($i = 1; $i <= $codeCharLenth; $i++) {
                // 通过字符串下标形式随机获取
                $verCode .= $baseChars{mt_rand(0, strlen($baseChars) - 1)};
            }
        }

        // 以下代码是将生成的验证码生成图片
        $font_size = 20;
        $width     = 60;
        $height    = 30;
        $img       = imagecreate($width, $height); // 新建一个基于调色板的图像

        $bgR        = mt_rand(50, 200); //r(ed)
        $bgG        = mt_rand(50, 200); //g(reen)
        $bgB        = mt_rand(50, 200); //b(lue)
        $background = imagecolorallocate($img, $bgR, $bgG, $bgB); // 背景色
        $black      = imagecolorallocate($img, 0, 0, 0);

        imagestring($img, 5, 9, 8, $verCode, $black); // 水平地画一行字符串

        ob_start();
        imagepng($img);
        $image = ob_get_contents();
        ob_end_clean();

        return array(
            'image' =>  $image,
            'code'  =>  $verCode
        );
    }

    /**
     * 获取原始图像数组
     * @param string $imageString
     * @return array
     */
    public function getImage($imageString) {
        $im = imagecreatefromstring($imageString);

        list($width, $height) = getimagesizefromstring($imageString);

        $image = array();

        for($x = 0;$x < $width;$x++) {
            for($y =0;$y < $height;$y++) {
                $rgb = imagecolorat($im, $x, $y);
                $rgb = imagecolorsforindex($im, $rgb);
                if($rgb['red'] == 0 && $rgb['green'] == 0 && $rgb['blue'] == 0) {
                    $image[$y][$x] = '*';
                } else {
                    $image[$y][$x] = 0;
                }
            }
        }

        return $image;
    }

    /**
     * 移除无用数据
     * @param array $image
     * @return array
     */
    public function remove($image) {
        //计算x和y轴的
        $xCount = count($image[0]); //60
        $yCount = count($image); //30

        $xFilter = array();
        for($x = 0;$x < $xCount;$x++) {
            $filter = true;
            for($y = 0;$y < $yCount;$y++) {
                $filter = $filter && ($image[$y][$x] == '0');
            }
            if($filter) {
                $xFilter[] = $x;
            }
        }

        //有字符的列
        $xImage = array_values(array_diff(range(0, 59), $xFilter));

        //存放关键字
        $wordImage = array();

        $preX = $xImage[0] - 1;
        $wordCount = 0;
        foreach($xImage as $xKey => $x) {
            if($x != ($preX + 1)) {
                $wordCount++;
            }
            $preX = $x;

            for($y = 0;$y < $yCount;$y++) {
                $wordImage[$wordCount][$y][$x] = $image[$y][$x];
            }
        }

        foreach($wordImage as $key=>$image) {
            $wordImage[$key] = $this->removeByLine($image);
        }


        return $wordImage;

    }

    /**
     * 按行移除无用数据
     * @param array $image
     * @return array
     */
    public function removeByLine($image) {

        $isFilter = false;
        foreach($image as $y => $yImage) {
            if($isFilter == true || array_filter($yImage)) {
                $isFilter = true;
            } else {
                unset($image[$y]);
            }
        }

        krsort($image);

        $isFilter = false;
        foreach($image as $y => $yImage) {
            if($isFilter == true || array_filter($yImage)) {
                $isFilter = true;
            } else {
                unset($image[$y]);
            }
        }

        ksort($image);

        return $image;
    }

    /**
     * 获取关键字字符串
     * @param array $wordImage
     * @return string
     */
    public function getWordString($wordImage) {
        $wordString = '';
        foreach($wordImage as $image) {
            foreach($image as $string) {
                $wordString .= $string;
            }
        }

        return $wordString;
    }

    /**
     * 匹配关键字
     * @param array $image
     * @return array
     */
    public function match($image) {
        $match = array(
            'min' => '',
            'key' => ''
        );
        foreach($this->_wordKeys as $k => $v) {
            $percent = 0.0;
            similar_text($this->getWordString($image), $v, $percent);
            if($match['min'] == '') {
                $match['min'] = $percent;
                $match['key'] = $k;
            } else {
                if($percent > $match['min']) {
                    $match['min'] = $percent;
                    $match['key'] = $k;
                }
            }
        }

        return $match;
    }

    /**
     * 终端显示验证码
     * @param $image
     */
    public function show($image) {
        foreach($image as $xImage) {
            foreach($xImage as $yImage) {
                echo $yImage;
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }
}


$vCode = new Vcode();

$codeImage = $vCode->make();
$imageString = $codeImage['image'];

$image = $vCode->getImage($imageString);
//原图
$vCode->show($image);

//去除干扰边框、拆字
$newImage = $vCode->remove($image);
$word = array();
$code = '';
foreach($newImage as $image) {
    $vCode->show($image);
    $code .= $vCode->match($image)['key'];
}

echo "生成的验证码为:{$codeImage['code']}" . PHP_EOL;
echo "识别的验证码为:{$code}" . PHP_EOL;


/*
//用来批量生成验证码的特征码。识别他人网站验证码，需要自己采集多张，人肉标记特征码
$vCode = new vCode();

$string = 'ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghigklmnopqrstuvwxyz0123456789';

$max = ceil(strlen($string) / 4);

$wordKeys = array();

for($i=0;$i<$max;$i++) {
    $code = substr($string, $i * 4, 4);
    $imageString = $vCode->make($code)['image'];


    $image = $vCode->getImage($imageString);
    $newImage = $vCode->remove($image);
    foreach($newImage as $key => $image) {
        $word = $vCode->getWordString($image);
        isset($code[$key]) && $wordKeys[$code[$key]] = $word;
    }
}

echo var_export($wordKeys);
*/
