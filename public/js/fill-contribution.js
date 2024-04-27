$(document).ready(function(){
    $('select[name="type-academicYear"]').change(function(){
        var selectedOption = $(this).val();
        $.ajax({
            url: '/get-academic-years',
            type: 'GET',
            data: { type: selectedOption },
            success: function(response){
                $('.list-academic').remove();
                $.each(response.academicYears, function(index, info){
                    var listItem = `
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 list-academic">
                            <div class="featured-box">
                                <div class="feature-card">
                                    <a href="/student/academicYear-detail?id=${info.id}"><i class="far fa-link"></i></a>
                                    <img src="${info.image}">
                                </div>
                                <div class="content">
                                    <h3>${info.name}</h3>
                                    <p>${info.detail}</p>
                                    <ol>
                                        <li>${info.publish_date}</li>
                                        <li>${info.deadline}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>`;
                    $('.listPage').append(listItem);
                });
            }
        });
    });
});
