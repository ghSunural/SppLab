<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="ru" />
    <title>Фото: подробная информация</title>
</head>
<body>
<script type="text/javascript">
    // РћР±СЂР°Р±РѕС‚РєР° РІС‹Р±СЂР°РЅРЅРѕРіРѕ С„Р°Р№Р»Р°
    function file_selected() {
        document.getElementById('log').innerHTML='';
        try {
            var file = document.getElementById('uploaded_file').files[0];
            if (file) {
                // РџСЂРµРґРІР°СЂРёС‚РµР»СЊРЅР°СЏ РїСЂРѕРІРµСЂРєР° РЅР° JPEG
                if (/\.(jpe?g)$/i.test(file.name)) {
                    write_log('File',file.name);
                    write_log('Size',file.size);

                    // РЎС‚Р°СЂС‹Рµ РІРµСЂСЃРёРё Firefox 3.6 - 7.0
                    if (typeof file.getAsBinary=='function') {
                        parse_exif(file.getAsBinary(),false);
                    }
                    else if (typeof file.getAsDataURL=='function') {
                        parse_exif(file.getAsDataURL(),true);
                    }
                    // Р‘СЂР°СѓР·РµСЂС‹ СЃ РїРѕРґРґРµСЂР¶РєРѕР№ HTML5
                    else {
                        if (typeof FileReader!='undefined') {
                            var reader = new FileReader();

                            reader.onloadend = function(evt) {
                                if (evt.target.readyState == FileReader.DONE) {
                                    // Р”Р°РЅРЅС‹Рµ РїСЂРёС€Р»Рё РІ base64
                                    if (evt.target.result.substr(0,5)=='data:') {
                                        parse_exif(evt.target.result, true);
                                    }
                                    // Р”РІРѕРёС‡РЅС‹Рµ РґР°РЅРЅС‹Рµ
                                    else {
                                        parse_exif(evt.target.result, false);
                                    }
                                }
                            };

                            var blob;
                            if (file.slice) {
                                blob = file.slice(0, file.size);
                            }
                            else if (file.webkitSlice) {
                                blob = file.webkitSlice(0, file.size);
                            }
                            else if (file.mozSlice) {
                                blob = file.mozSlice(0, file.size);
                            }

                            // Р•СЃР»Рё РїРѕРґРґРµСЂР¶РёРІР°РµС‚СЃСЏ Р±РёРЅР°СЂРЅРѕРµ С‡С‚РµРЅРёРµ, С‚Рѕ РёСЃРїРѕР»СЊР·РѕРІР°С‚СЊ РµРіРѕ
                            if (typeof file.getAsBinary=='function') {
                                reader.readAsBinaryString(blob);
                            }
                            // РСЃРїРѕР»СЊР·РѕРІР°С‚СЊ С‡С‚РµРЅРёРµ РІ base64
                            else {
                                reader.readAsDataURL(blob);
                            }
                        }
                    }
                }
            }
        }
        catch(e) {
            // Р‘СЂР°СѓР·РµСЂ РЅРµ РїРѕРґРґРµСЂР¶РёРІР°РµС‚ СЂР°Р±РѕС‚Сѓ СЃ СЃРѕРґРµСЂР¶РёРјС‹Рј С„Р°Р№Р»РѕРІ
            write_log('Error','Not supported');
        }
    }

    // РџРѕРёСЃРє РІ РёР·РѕР±СЂР°Р¶РµРЅРёРё Рё СЂР°Р·Р±РѕСЂ СЃРµРєС†РёРё EXIF
    function parse_exif(data,decode) {
        var image_data=decode?base64decode(data.substr(data.indexOf(',')+1)):data;
        var section_id, section_length, exif;
        var offset_tags, num_of_tags, tag_id, tag_len, tag_value;

        // Р­С‚Рѕ JPEG-С„Р°Р№Р»?
        if (image_data.substr(0,2)=='\xFF\xD8') {
            var idx=2;
            while (true) {
                // РЈРєР°Р·Р°С‚РµР»СЊ РІС‹С€РµР» Р·Р° РїСЂРµРґРµР»С‹ РёР·РѕР±СЂР°Р¶РµРЅРёСЏ
                if (idx>=image_data.length) { break; }

                // ID СЃРµРєС†РёРё
                chr1=image_data.charCodeAt(idx++);
                chr2=image_data.charCodeAt(idx++);
                section_id=(chr1<<8)+chr2;
                // Р Р°Р·РјРµСЂ СЃРµРєС†РёРё
                chr1=image_data.charCodeAt(idx++);
                chr2=image_data.charCodeAt(idx++);
                section_length=(chr1<<8)+chr2;

                // РќР°С‡Р°Р»РѕСЃСЊ РёР·РѕР±СЂР°Р¶РµРЅРёРµ?
                if (section_id==0xFFD8 || section_id==0xFFDB ||
                    section_id==0xFFC4 || section_id==0xFFDD ||
                    section_id==0xFFC0 || section_id==0xFFDA ||
                    section_id==0xFFD9) {
                    break;
                }

                // РЎРµРєС†РёСЏ EXIF?
                if (section_id==0xFFE1) {
                    exif=image_data.substr(idx,(section_length-2));
                    if (exif.substr(0,4)=='Exif') {
                        // РћРїСЂРµРґРµР»РёС‚СЊ РїРѕСЂСЏРґРѕРє РґРµРєРѕРґРёСЂРѕРІР°РЅРёСЏ РґР»СЏ Big-endian Рё Little-endian
                        if (exif.substr(6,2)=='II') {
                            this.mask4=function(str) {
                                var chr1, chr2, chr3, chr4;
                                chr1=str.charCodeAt(0);
                                chr2=str.charCodeAt(1);
                                chr3=str.charCodeAt(2);
                                chr4=str.charCodeAt(3);
                                return (chr4<<24)+(chr3<<16)+(chr2<<8)+chr1;
                            }
                            this.mask2=function(str) {
                                var chr1, chr2;
                                chr1=str.charCodeAt(0);
                                chr2=str.charCodeAt(1);
                                return (chr2<<8)+chr1;
                            }
                        }
                        else if (exif.substr(6,2)=='MM') {
                            this.mask4=function(str) {
                                var chr1, chr2, chr3, chr4;
                                chr1=str.charCodeAt(3);
                                chr2=str.charCodeAt(2);
                                chr3=str.charCodeAt(1);
                                chr4=str.charCodeAt(0);
                                return (chr4<<24)+(chr3<<16)+(chr2<<8)+chr1;
                            }
                            this.mask2=function(str) {
                                var chr1, chr2;
                                chr1=str.charCodeAt(1);
                                chr2=str.charCodeAt(0);
                                return (chr2<<8)+chr1;
                            }
                        }
                        // Р”Р°РЅРЅС‹Рµ EXIF РЅРµРєРѕСЂСЂРµРєС‚РЅС‹Рµ
                        else {
                            return false;
                        }

                        // РљРѕР»РёС‡РµСЃС‚РІРѕ С‚РµРіРѕРІ Рё СЃРјРµС‰РµРЅРёРµ
                        offset_tags=this.mask4(exif.substr(10,4));
                        num_of_tags=this.mask2(exif.substr(14,2));

                        if (num_of_tags>0) {
                            offset=offset_tags+8;

                            for(var i=0; i<num_of_tags; i++) {
                                // ID С‚РµРіР°, СЂР°Р·РјРµСЂ РґР°РЅРЅС‹С… Рё Р·РЅР°С‡РµРЅРёРµ С‚РµРіР°
                                tag_id=this.mask2(exif.substr(offset,2));
                                tag_len=this.mask4(exif.substr(offset+4,4));
                                tag_value=this.mask4(exif.substr(offset+8,4));

                                // Make
                                if (tag_id==0x010f && tag_len>0 && tag_value>0) {
                                    write_log('Make',exif.substr(tag_value+6,tag_len));
                                }
                                // Model
                                else if (tag_id==0x0110 && tag_len>0 && tag_value>0) {
                                    write_log('Model',exif.substr(tag_value+6,tag_len));
                                }
                                // ModifyDate
                                else if (tag_id==0x0132 && tag_len>0 && tag_value>0) {
                                    write_log('ModifyDate',exif.substr(tag_value+6,tag_len));
                                }
                                // Software
                                else if (tag_id==0x0131 && tag_len>0 && tag_value>0) {
                                    write_log('Software',exif.substr(tag_value+6,tag_len));
                                }
                                // ImageDescription
                                else if (tag_id==0x010e && tag_len>0 && tag_value>0) {
                                    write_log('ImageDescription',exif.substr(tag_value+6,tag_len));
                                }
                                // Artist
                                else if (tag_id==0x013b && tag_len>0 && tag_value>0) {
                                    write_log('Artist',exif.substr(tag_value+6,tag_len));
                                }
                                // Orientation
                                else if (tag_id==0x0112 && tag_len>0) {
                                    write_log('Orientation',this.mask2(exif.substr(offset+8,2)));
                                }
                                // Copyright
                                else if (tag_id==0x8298 && tag_len>0 && tag_value>0) {
                                    write_log('Copyright',exif.substr(tag_value+6,tag_len));
                                }
                                // GPSInfo
                                else if (tag_id==0x8825 && tag_len>0) {
                                    // РђРґСЂРµСЃ GPSInfo РІ СЃРµРєС†РёРё
                                    var gps_offset=tag_value+6;
                                    // РљРѕР»РёС‡РµСЃС‚РІРѕ GPS-С‚РµРіРѕРІ
                                    var num_of_gps_tags=tag_id=this.mask2(exif.substr(gps_offset,2));

                                    if (num_of_gps_tags>0) {
                                        gps_offset+=2;

                                        // РћР±СЂР°Р±РѕС‚РєР° GPS-С‚РµРіРѕРІ
                                        for (j=0; j<num_of_gps_tags; j++) {
                                            tag_id=this.mask2(exif.substr(gps_offset,2));
                                            tag_value=this.mask4(exif.substr(gps_offset+8,4));

                                            // GPSLatitudeRef РёР»Рё GPSLongitudeRef
                                            if (tag_id==0x0001 || tag_id==0x0003) {
                                                if (tag_value!=0) {
                                                    if (tag_id==0x0001) {
                                                        write_log('GPSLatitudeRef',exif.substr(gps_offset+8,1));
                                                    }
                                                    else {
                                                        write_log('GPSLongitudeRef',exif.substr(gps_offset+8,1));
                                                    }
                                                }
                                            }
                                            // GPSLatitude РёР»Рё GPSLongitude
                                            else if (tag_id==0x0002 || tag_id==0x0004) {
                                                var rational_offset=tag_value+6;
                                                var val1=this.mask4(exif.substr(rational_offset+4*0,4));
                                                var div1=this.mask4(exif.substr(rational_offset+4*1,4));
                                                var val2=this.mask4(exif.substr(rational_offset+4*2,4));
                                                var div2=this.mask4(exif.substr(rational_offset+4*3,4));
                                                var val3=this.mask4(exif.substr(rational_offset+4*4,4));
                                                var div3=this.mask4(exif.substr(rational_offset+4*5,4));
                                                if (div1!=0 && div2!=0 && div3!=0) {
                                                    var tmp=val1/div1+val2/div2/60+val3/div3/3600;
                                                    if (tag_id==0x0002) {
                                                        write_log('GPSLatitude',tmp);
                                                    }
                                                    else {
                                                        write_log('GPSLongitude',tmp);
                                                    }
                                                }
                                            }
                                            gps_offset+=12;
                                        }
                                    }
                                }
                                // ExifOffset
                                else if (tag_id==0x8769 && tag_len>0) {
                                    // РђРґСЂРµСЃ СЂР°СЃС€РёСЂРµРЅРЅРѕР№ EXIF-СЃРµРєС†РёРё
                                    var exif_offset=tag_value+6;
                                    // РљРѕР»РёС‡РµСЃС‚РІРѕ EXIF-С‚РµРіРѕРІ
                                    var num_of_exif_tags=tag_id=this.mask2(exif.substr(exif_offset,2));

                                    if (num_of_exif_tags>0) {
                                        exif_offset+=2;

                                        // РћР±СЂР°Р±РѕС‚РєР° EXIF-С‚РµРіРѕРІ
                                        for (j=0; j<num_of_exif_tags; j++) {
                                            // ID С‚РµРіР°, СЂР°Р·РјРµСЂ РґР°РЅРЅС‹С… Рё Р·РЅР°С‡РµРЅРёРµ С‚РµРіР°
                                            tag_id=this.mask2(exif.substr(exif_offset,2));
                                            tag_len=this.mask4(exif.substr(exif_offset+4,4));
                                            tag_value=this.mask4(exif.substr(exif_offset+8,4));

                                            // DateTimeOriginal
                                            if (tag_id==0x9003 && tag_len>0 && tag_value>0) {
                                                write_log('DateTimeOriginal',exif.substr(tag_value+6,tag_len));
                                            }
                                            // ExifVersion
                                            else if (tag_id==0x9000) {
                                                var tmp=exif.substr(exif_offset+9,1)+'.';
                                                if (exif.substr(exif_offset+11,1)!='0') {
                                                    tmp+=exif.substr(exif_offset+10,2);
                                                }
                                                else {
                                                    tmp+=exif.substr(exif_offset+10,1);
                                                }
                                                write_log('ExifVersion',tmp);
                                            }
                                            // ExifImageWidth
                                            else if (tag_id==0xa002 && tag_len>0 && tag_value!=0) {
                                                var tmp=this.mask2(exif.substr(exif_offset+8,2));
                                                if (tmp==0) {
                                                    tmp=this.mask2(exif.substr(exif_offset+10,2));
                                                }
                                                write_log('ExifImageWidth',tmp);
                                            }
                                            // ExifImageHeight
                                            else if (tag_id==0xa003 && tag_len>0 && tag_value!=0) {
                                                var tmp=this.mask2(exif.substr(exif_offset+8,2));
                                                if (tmp==0) {
                                                    tmp=this.mask2(exif.substr(exif_offset+10,2));
                                                }
                                                write_log('ExifImageHeight',tmp);
                                            }
                                            // CreateDate
                                            else if (tag_id==0x9004 && tag_len>0 && tag_value>0) {
                                                write_log('CreateDate',exif.substr(tag_value+6,tag_len));
                                            }
                                            // UserComment
                                            else if (tag_id==0x9286 && tag_len>0 && tag_value>0) {
                                                var tmp=exif.substr(tag_value+6,tag_len);
                                                if (tmp.substr(0,5)=='ASCII') {
                                                    tmp=tmp.substr(6);
                                                }
                                                else if (tmp.substr(0,7)=='UNICODE') {
                                                    tmp=tmp.substr(8);
                                                }
                                                write_log('UserComment',tmp);
                                            }
                                            // OwnerName
                                            else if (tag_id==0xa430 && tag_len>0 && tag_value>0) {
                                                write_log('OwnerName',exif.substr(tag_value+6,tag_len));
                                            }
                                            // SerialNumber
                                            else if (tag_id==0xa431 && tag_len>0 && tag_value>0) {
                                                write_log('SerialNumber',exif.substr(tag_value+6,tag_len));
                                            }
                                            // LensMake
                                            else if (tag_id==0xa433 && tag_len>0 && tag_value>0) {
                                                write_log('LensMake',exif.substr(tag_value+6,tag_len));
                                            }
                                            // LensModel
                                            else if (tag_id==0xa434 && tag_len>0 && tag_value>0) {
                                                write_log('LensModel',exif.substr(tag_value+6,tag_len));
                                            }
                                            // LensSerialNumber
                                            else if (tag_id==0xa435 && tag_len>0 && tag_value>0) {
                                                write_log('LensSerialNumber',exif.substr(tag_value+6,tag_len));
                                            }
                                            // OwnerName
                                            else if (tag_id==0xfde8 && tag_len>0 && tag_value>0) {
                                                write_log('OwnerName',exif.substr(tag_value+6,tag_len));
                                            }
                                            // SerialNumber
                                            else if (tag_id==0xfde9 && tag_len>0 && tag_value>0) {
                                                write_log('SerialNumber',exif.substr(tag_value+6,tag_len));
                                            }
                                            // Lens
                                            else if (tag_id==0xfdea && tag_len>0 && tag_value>0) {
                                                write_log('Lens',exif.substr(tag_value+6,tag_len));
                                            }

                                            exif_offset+=12;
                                        }
                                    }


                                }
                                offset+=12;
                            }
                        }
                    }
                }
                idx+=(section_length-2);
            }
        }
    }
    // РџРѕС‡РёСЃС‚РёС‚СЊ Рё Р·Р°РїРёСЃР°С‚СЊ СЃС‚СЂРѕРєСѓ РІ Р»РѕРі
    function write_log(tg,str) {
        var str=str.toString().replace(/\x00/g,'');
        str=str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
        if (str!='') {
            document.getElementById('log').innerHTML+=(tg+': '+str+'\n');
        }
    }

    // Р¤СѓРЅРєС†РёСЏ РґРµРєРѕРґРёСЂРѕРІР°РЅРёСЏ СЃС‚СЂРѕРєРё РёР· base64
    function base64decode(str) {
        // РЎРёРјРІРѕР»С‹ РґР»СЏ base64-РїСЂРµРѕР±СЂР°Р·РѕРІР°РЅРёСЏ
        var b64chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefg'+
            'hijklmnopqrstuvwxyz0123456789+/=';
        var b64decoded = '';
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;

        str = str.replace(/[^a-z0-9\+\/\=]/gi, '');

        for (var i=0; i<str.length;) {
            enc1 = b64chars.indexOf(str.charAt(i++));
            enc2 = b64chars.indexOf(str.charAt(i++));
            enc3 = b64chars.indexOf(str.charAt(i++));
            enc4 = b64chars.indexOf(str.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;

            b64decoded = b64decoded + String.fromCharCode(chr1);

            if (enc3 < 64) {
                b64decoded += String.fromCharCode(chr2);
            }
            if (enc4 < 64) {
                b64decoded += String.fromCharCode(chr3);
            }
        }
        return b64decoded;
    }
</script>

<div class="input_file">
    <input type="file" size="25" name="uploaded_file" id="uploaded_file" onchange="file_selected();" accept="image/*,image/jpeg" />
</div>
<pre id="log"></pre>
</body>









