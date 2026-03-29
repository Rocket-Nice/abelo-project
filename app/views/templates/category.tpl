<div class="category-page">
    <div class="category-info">
        <h2>{$category.name}</h2>
        <p>{$category.description}</p>
        <div class="stats">Всего статей: {$totalArticles}</div>
    </div>
    
    <div class="sorting">
        <span>Сортировать:</span>
        <a href="?order=date&page=1" {if $currentOrder == 'date'}class="active"{/if}>По дате</a>
        <a href="?order=views&page=1" {if $currentOrder == 'views'}class="active"{/if}>По просмотрам</a>
    </div>
    
    <div class="articles-list">
        {foreach $articles as $article}
            <div class="article-item">
                {if $article.image}
                    <img src="{$article.image}" alt="{$article.title}" class="article-image">
                {/if}
                <div class="article-content">
                    <h3><a href="/article/{$article.id}">{$article.title}</a></h3>
                    <p>{$article.description}</p>
                    <div class="meta">
                        <span>👁️ {$article.views}</span>
                        <span>📅 {$article.created_at|date_format:"%d.%m.%Y"}</span>
                    </div>
                </div>
            </div>
        {foreachelse}
            <p>В этой категории пока нет статей.</p>
        {/foreach}
    </div>
    
    {if $totalPages > 1}
        <div class="pagination">
            {if $currentPage > 1}
                <a href="?order={$currentOrder}&page={$currentPage-1}">← Назад</a>
            {/if}
            
            {for $page = 1 to $totalPages}
                {if $page == $currentPage}
                    <span class="current">{$page}</span>
                {else}
                    <a href="?order={$currentOrder}&page={$page}">{$page}</a>
                {/if}
            {/for}
            
            {if $currentPage < $totalPages}
                <a href="?order={$currentOrder}&page={$currentPage+1}">Вперед →</a>
            {/if}
        </div>
    {/if}
</div>