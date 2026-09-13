# 1st Digital Infantry

## Green Site

#### Circa 2004

A restoration of the original Flash-based 1st Digital Infantry site,
running on [Ruffle](https://ruffle.rs/) instead of the long-dead Adobe
Flash Player. Source recovered from a CD/DVD backup.

## Layout

- `docs/` — the site itself, meant to be served via GitHub Pages
  ("Deploy from a branch", `/docs` folder). `index.html` has been
  stripped of its obsolete ActiveX/VBScript Flash-detection code and
  replaced with a single Ruffle-polyfilled `<embed>` pointing at
  `1dibase.swf` (the main Flash shell, which itself loads the other SWFs).
  Ruffle is vendored under `docs/ruffle/` (self-hosted, not CDN-loaded) so
  the site doesn't depend on an external host staying up.
- `db_examples/` — the original site's PHP scripts that depended on a
  MySQL backend that no longer exists (news ticker, member roster, the
  BF2-stats-driven "dynamic signature" image generator, etc). Not wired
  into `docs/` yet — see `db_examples/README.md` for details and guesses
  at what each one used to output.

## What's known not to work yet

- Anything that was PHP/MySQL-backed on the live site (news feed, member
  list, links/allies list, server list, dynamic signature generator) —
  those endpoints aren't present in `docs/`, so the SWFs that fetch them
  will show empty/broken data. See `db_examples/`.
- FLV playback inside the SWFs is hit-or-miss under Ruffle depending on
  the original codec — may or may not play.
- Not included at all: a bundled MediaWiki install and a private
  admin CMS backend that lived alongside the site — out of scope, and
  neither would run on static GitHub Pages anyway.

## Setup notes

Ruffle version vendored: `v0.6.0` (self-hosted web build, source maps
stripped). To update, download the latest
`ruffle-X.Y.Z-web-selfhosted.zip` from the
[Ruffle releases page](https://github.com/ruffle-rs/ruffle/releases) and
replace the contents of `docs/ruffle/`.
