function changeImg() {
    /*��ȡͼƬ������������*/
    var $imgs = $("#ad_img li");
    var $nums = $("#ad_num li");

    var isStop = false;
    var index = 0;

    $nums.eq(index).addClass("numsover").siblings().removeClass("numsover");
    $imgs.eq(index).show();

    /*�����ͣ�������ϵ��¼�*/
    $nums.mouseover(function() {
        isStop = true;
        /*�Ȱ����ֵı�������*/
        $(this).addClass("numsover").siblings().removeClass("numsover");

        /*ͼƬ�����������ֵ������Ƕ�Ӧ�ģ����Ի�ȡ��ǰ�����ֵ������Ϳ��Ի��ͼƬ���Ӷ���ͼƬ���в���*/
        index = $nums.index(this);
        $imgs.eq(index).show("slow");
        $imgs.eq(index).siblings().hide("slow");
    }).mouseout(function() {
        isStop = false
    });
    /*����ѭ��*/
    setInterval(function() {
        if(isStop) return;
        if(index >= 5) index = -1;
        index++;

        $nums.eq(index).addClass("numsover").siblings().removeClass("numsover");
        $imgs.eq(index).show("slow").siblings().hide("slow");

    }, 3000);



}
