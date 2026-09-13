# db_examples

This folder holds the server-side PHP scripts from the original site that
depended on a MySQL database (`diadmin_ClanBase`) which no longer exists.
GitHub Pages only serves static files, so none of this runs there — it's kept
here for reference while we rebuild the dynamic bits as static data later.

Not included: the bundled MediaWiki install (`wiki/`) and the private admin
CMS (`tehAdmin/`, `sigbar/`, `unused/`) used to edit news/members/medals —
out of scope for this pass, per discussion.

**Credentials removed.** `db.php` and `security.php` originally contained a
live plaintext DB host/user/password — those values have been replaced with
`REDACTED` in this copy. Do not restore the real values in a public repo.

## Files that are already real static output (not a guess)

A few of these ".php" files turned out to *already be* flat, pre-rendered
data rather than live scripts — no query needed, they just echo real
historical content when requested:

- `newsData.php` — a real cached news entry, verbatim.
- `names.php` — a real member roster (18 names) as of whenever it was last
  regenerated.
- `links_and_allies.php` — real allies/links list.
- `servers_data.php` — real server info (TeamSpeak + BF2 server IPs).

These are almost certainly what the Flash movies actually fetched at
runtime — they could plausibly be dropped into `docs/` unmodified and
"just work" on GitHub Pages (static GET request, static response). We left
them out of `docs/` per your instruction to hold off on all DB-shaped
content until you've seen the base site working, but they're candidates to
promote later.

## Files that are genuinely dynamic (guessed output below)

- `getCurrentNews.php` — the "real" live news endpoint (queries `News`
  table, prepends security include). Likely superseded by the static
  `newsData.php` late in the site's life. See `getCurrentNews.example.txt`.
- `old-names.php` — believed to be an earlier/alternate member list
  renderer. See `old-names.example.txt`.
- `Copy of newsData.php` — a stale duplicate; its content is itself static
  historical news data, kept as-is (see the file directly).
- `newsData_inprogress.php` / `newsData_inprogress2.php` — abandoned
  WIP rewrites of the news endpoint, one of which just prints a literal
  `"This is a test"` placeholder. Not real content — see the example files
  for what a completed version probably would have returned.
- `db.php` / `security.php` — connection/include files, not endpoints; they
  don't print anything themselves.
- `dynamicsig/DisplayBF2Stats.php`, `dynamicsig4.php`, `makesig.php` — the
  "dynamic signature" image generator (pulls BF2 stats from a
  now-defunct stats API and composites a PNG badge). See
  `dynamicsig/makesig.example.txt` for a guess at the generated image's
  content/labels — the actual output was a PNG, which can't be usefully
  "guessed" as text.
