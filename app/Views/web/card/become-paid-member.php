<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Become a Paid Member — Rishte Hi Rishte</title>
  <style>
    :root {
      --bg1: #0a0a0a;
      --maroon: #7A1C1C;
      --blue: #004AAD;
      --gold: #D9B45C;
      --light: #FFFFFF;
      --muted: rgba(255,255,255,0.8);
      --radius: 14px;
    }

    /*body {
      background: radial-gradient(circle at top left, rgba(122,28,28,0.3), transparent 40%),
                  radial-gradient(circle at bottom right, rgba(0,74,173,0.25), transparent 50%),
                  var(--bg1);
      color: var(--light);
      font-family: 'Poppins', sans-serif;
      padding: 40px;
    }
*/
    /*.panel {
      max-width: 1100px;
      margin: auto;
      background: rgba(255,255,255,0.03);
      border-radius: var(--radius);
      padding: 40px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.6);
    }*/

    .kicker {
      display:inline-block;
      padding:6px 14px;
      border-radius:999px;
      background: linear-gradient(90deg, var(--blue), var(--gold));
      font-weight:600;
      color:white;
      font-size:13px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    /*h1 {
      font-weight: 700;
      font-size: 32px;
      color: var(--gold);
    }

    p.lead {
      color: var(--muted);
      max-width: 65ch;
    }*/

    .feature-card {
      background: rgba(255,255,255,0.05);
      border-radius: 12px;
      padding: 16px;
      border: 1px solid rgba(255,255,255,0.06);
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      background: rgba(217,180,92,0.08);
      transform: translateY(-4px);
    }

    

    .btn-primary-grad {
      background-image: linear-gradient(90deg, var(--maroon), var(--blue));
      border: 0;
      border-radius: 10px;
      padding: 12px 24px;
      font-weight: 600;
      color: white;
      transition: 0.3s;
    }

    .btn-primary-grad:hover {
      background-image: linear-gradient(90deg, var(--blue), var(--maroon));
      transform: scale(1.03);
    }

    .cta-card {
      background: linear-gradient(180deg, rgba(122,28,28,0.15), rgba(0,74,173,0.08));
      border-radius: var(--radius);
      padding: 24px;
      text-align: center;
      border: 1px solid rgba(255,255,255,0.06);
    }

    .feature-card>.text-warning {
      font-size: 40px;
    }
    
    
  </style>
</head>
<body>
  <div class="panel">
    

    <div class="row g-4 align-items-center">
      <div class="col-lg-8">
        <span class="kicker">Premium Membership</span>
        <h1 class="mt-3">Become a paid member</h1>
        <p class="lead">RM ASSISTANCE PLAN -- <strong>Premium | Personalised | Confidential Matrimonial services</strong></p>

        <div class="row gy-3 mt-4">
          <div class="col-sm-6">
            <div class="feature-card d-flex gap-3 align-items-start">
              <div class="flex-shrink-0 text-warning">💖</div>
              <div>
                <h5 class="mb-1">Verified Matches</h5>
                <div class="text-muted small">Connect with genuine and verified profiles only.</div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="feature-card d-flex gap-3 align-items-start">
              <div class="flex-shrink-0 text-warning">🌟</div>
              <div>
                <h5 class="mb-1">Top Listing</h5>
                <div class="text-muted small">Your profile appears on top of search results.</div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="feature-card d-flex gap-3 align-items-start">
              <div class="flex-shrink-0 text-warning">📞</div>
              <div>
                <h5 class="mb-1">Direct Contact</h5>
                <div class="text-muted small">Get contact access to interested members.</div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="feature-card d-flex gap-3 align-items-start">
              <div class="flex-shrink-0 text-warning">🤝</div>
              <div>
                <h5 class="mb-1">Relationship Support</h5>
                <div class="text-muted small">Dedicated manager to assist in your matchmaking journey.</div>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-4">
          <a href="<?=base_url()?>packages" class="btn btn-lg btn-primary-grad me-2">View Packages</a>
          <a href="#" class="btn btn-outline-light btn-lg">Learn More</a>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="cta-card">
          <h4>Start Your Premium Journey</h4>
          <p class="text-muted small">No commitment · Cancel anytime</p>

          <div class="my-3">
            <div class="display-6 fw-bold" style="color:var(--gold);">Find Your Perfect Match</div>
            <div class="text-muted">Because love deserves the best platform</div>
          </div>

          <div class="d-grid gap-2">
            <a href="<?=base_url()?>packages" class="btn btn-lg btn-primary-grad">Choose a Plan</a>
            <a href="<?=base_url()?>contact" class="btn btn-light btn-sm">Contact Us</a>
          </div>

          <small class="d-block text-muted mt-3">Secure · Trusted · Since 1976</small>
        </div>
      </div>
    </div>
  </div>


</body>
</html>
