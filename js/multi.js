var multi="египет&отдых|Египет|Египте|египт|египед;Туры в Египет<br/>с Гарантией лучшей цены<br/>в Киеве\n\
болгарии|болгария|болгарию;Туры в Болгарию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
турц|туретск;Туры в Турцию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
грец|грецк|греческ;Туры в Грецию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
испани|испанск;Туры в Испанию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
кипр;Туры на Кипр<br/>с Гарантией лучшей цены<br/>в Киеве\n\
черногор;Туры в Черногорию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
хорват;Туры в Хорватию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
мальдив;Туры на Мальдивы<br/>с Гарантией лучшей цены<br/>в Киеве\n\
шри ланка|шри ланке|шри ланку;Туры в Шри-Ланку<br/>с Гарантией лучшей цены<br/>в Киеве\n\
оаэ|эмират|емират|объединенные арабские|оае;Туры в ОАЭ<br/>с Гарантией лучшей цены<br/>в Киеве\n\
франц;Туры в Францию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
итали|итальян;Туры в Италию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
занзибар;Туры в Занзибар<br/>с Гарантией лучшей цены<br/>в Киеве\n\
доминикан;Туры в Доминикану<br/>с Гарантией лучшей цены<br/>в Киеве\n\
индия|индус;Туры в Индию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
тайланд|тиланд;Туры в Тайланд<br/>с Гарантией лучшей цены<br/>в Киеве\n\
индонези;Туры в Индонезию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
чехи|чешска|чехск;Туры в Чехию<br/>с Гарантией лучшей цены<br/>в Киеве\n\
европ|europ|evrop;Туры в Европу<br/>с Гарантией лучшей цены<br/>в Киеве\n\
израил|израел;Туры в Израиль<br/>с Гарантией лучшей цены<br/>в Киеве\n\
не дорого|недорого|дешево|низкая цена;Недорогие Горящие Туры<br/>с Гарантией лучшей цены<br/>в Киеве";


yaParams={}
$(function() {
    function getURLParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null;
    }
    // UTM
    utm=[];
    $.each(["utm_source","utm_medium","utm_campaign","utm_term",'source_type','source','position_type','position','added','creative','matchtype'],function(i,v){
        utm[v]=getURLParameter(v) || $.cookie(v);
        $.cookie(v, utm[v], { expires: 365, path: '/' });
        $('<input type="hidden" />').attr({
            name: "content["+v+"]",
            value: utm[v]
        }).appendTo("form");
    });

    // MULTI

    var ab_title = "default";
    if(utm['utm_term']){
        multi=(multi+"").split('\n');
        multi=$.map(multi,function(v, i){
            arr1=v.split(';');
            r=new RegExp(arr1[0]);
            return {reg: r,val: arr1[1]};
        });
        multi=jQuery.grep(multi,function(v,i){
            return utm['utm_term'].search(v.reg) > -1
        });
        if(multi[0]){
            ab_title=multi[0].val;
            $("#for-multi").html(ab_title);
            /*jQuery(".subtitle-none").html('');
            jQuery(".text-slider-none").addClass('text-slider-new');*/
        }
    }

    yaParams={ ab_title: ab_title }
    try { //если метрика уже была, то тут. Если нет, то в коде метрики.
        yaCounter.params(yaParams);
    } catch(e) { }

});