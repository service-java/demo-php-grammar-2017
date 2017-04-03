<?php
# @Author: 骆金参
# @Date:   2017-03-14T23:21:12+08:00
# @Email:  1095947440@qq.com
# @Filename: goto_test.php
# @Last modified by:   骆金参
# @Last modified time: 2017-03-18T01:30:20+08:00


for($i=0,$j=50; $i<100; $i++) {
  while($j--) {
    if($j==17) {
      goto end;
    }
  }
}

echo "hello";
end:
echo "hi";
