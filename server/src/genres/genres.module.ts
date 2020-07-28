import { Module } from '@nestjs/common';
import {TypeOrmModule} from "@nestjs/typeorm";
import {Zanr} from "../entity/Zanr.entity";
import {GenresController} from "./genres.controller";
import {GenresService} from "./genres.service";

@Module({
    imports: [TypeOrmModule.forFeature([Zanr])],
    controllers: [GenresController],
    providers: [ GenresService],
    exports: [GenresService]
})
export class GenresModule {}