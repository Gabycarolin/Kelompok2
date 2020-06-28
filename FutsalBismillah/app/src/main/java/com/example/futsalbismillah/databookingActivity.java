package com.example.futsalbismillah;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class databookingActivity extends AppCompatActivity {
     Button cetak;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_databooking);
        Button back = (Button) findViewById(R.id.btnkembali);
        cetak = (Button) findViewById(R.id.cetak);
        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent inte = new Intent(databookingActivity.this, MainActivity.class);
                startActivity(inte);
            }
        });
        cetak.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent inte = new Intent(databookingActivity.this, tiketActivity.class);
                startActivity(inte);
            }
        });
    }
}