<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
   <body>
    <p>This page uses frames. The current browser you are using does not support frames.</p>
			<?php
			$filename = 'test.txt';
			$somecontent = "�����Щ���ֵ��ļ�\n";
			
			// ��������Ҫȷ���ļ����ڲ��ҿ�д��
			if (is_writable($filename)) {
			
			    // �������������ǽ�ʹ�����ģʽ��$filename��
			    // ��ˣ��ļ�ָ�뽫�����ļ��Ŀ�ͷ��
			    // �Ǿ��ǵ�����ʹ��fwrite()��ʱ��$somecontent��Ҫд��ĵط���
			    if (!$handle = fopen($filename, 'a')) {
			         echo "���ܴ��ļ� $filename";
			         exit;
			    }
			
			    // ��$somecontentд�뵽���Ǵ򿪵��ļ��С�
			    if (fwrite($handle, $somecontent) === FALSE) {
			        echo "����д�뵽�ļ� $filename";
			        exit;
			    }
			
			    echo "�ɹ��ؽ� $somecontent д�뵽�ļ�$filename";
			
			    fclose($handle);
			
			} else {
			    echo "�ļ� $filename ����д";
			}
			echo "hello";
			?> 
    </body>
</html>