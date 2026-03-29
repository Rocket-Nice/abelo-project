<article class="full-article">
    {if $article.image}
        <div class="article-image-wrapper">
            <img src="{$article.image}" alt="{$article.title}" class="main-image">
        </div>
    {/if}
    
    <h1>{$article.title}</h1>
    
    <div class="meta">
        <span>👁️ {$article.views} просмотров</span>
        <span>📅 {$article.created_at|date_format:"%d.%m.%Y %H:%M"}</span>
    </div>
    
    {if $article.categories}
        <div class="categories">
            <strong>Категории:</strong>
            {foreach $article.categories as $cat}
                <a href="/category/{$cat.id}" class="category-badge">{$cat.name}</a>
            {/foreach}
        </div>
    {/if}
    
    <div class="description">
        <h3>Описание</h3>
        <p>{$article.description}</p>
    </div>
    
    <div class="content">
        <h3>Содержание</h3>
        <p>{$article.content}</p>
    </div>
</article>

{if $related}
    <section class="related-articles">
        <h3>Похожие статьи</h3>
        <div class="articles-grid">
            {foreach $related as $item}
                <div class="article-card">
                    {if $item.image}
                        <img src="{$item.image}" alt="{$item.title}">
                    {/if}
                    <div class="article-content">
                        <h4><a href="/article/{$item.id}">{$item.title}</a></h4>
                        <p>{$item.description|truncate:80}</p>
                        <div class="meta">
                            <span>👁️ {$item.views}</span>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>
    </section>
{/if}