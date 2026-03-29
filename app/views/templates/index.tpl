<h2 class="main-h2">Главная страница</h2>

{foreach $categories as $category}
    <div class="category-section">
        <div class="category-header">
            <h3>{$category.name}</h3>
            <p>{$category.description}</p>
            <a href="/category/{$category.id}" class="btn">Все статьи →</a>
        </div>
        
        <div class="articles-grid">
            {foreach $latestArticles[$category.id] as $article}
                <div class="article-card">
                    {if $article.image}
                        <img src="{$article.image}" alt="{$article.title}">
                    {/if}
                    <div class="article-content">
                        <h4><a href="/article/{$article.id}">{$article.title}</a></h4>
                        <div class="meta">
                            <span>👁️ {$article.views}</span>
                            <span>📅 {$article.created_at|date_format:"%d.%m.%Y"}</span>
                        </div>
                        <p>{$article.description|truncate:100}</p>
                    </div>
                </div>
            {foreachelse}
                <p>Нет статей в этой категории</p>
            {/foreach}
        </div>
    </div>
{foreachelse}
    <p>Нет категорий</p>
{/foreach}