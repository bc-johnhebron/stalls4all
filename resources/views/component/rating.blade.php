<span class="rating-stars">
  @for ($i = 0; $i < $score; $i++)
    <span class="star-filled">&#9733;</span>
  @endfor
  @for ($i = $score; $i < 5; $i++)
    <span class="star-empty">&#9734;</span>
  @endfor
</span>
